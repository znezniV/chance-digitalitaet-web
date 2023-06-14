<?php

namespace Deployer;

require 'vendor/symfony/dotenv/Dotenv.php';
require 'recipe/common.php';

// Project name
set('application', 'chance-digitalitaet-web');

set('default_stage', 'staging');

set('keep_releases', 7);

set('ssh_multiplexing', true);

set('http_user', 'www-data');
set('writable_mode', 'chmod');

// Project repository
set('repository', 'git@github.com:znezniV/chance-digitalitaet-web.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', ['.env', 'config/license.key']);
set('shared_dirs', ['public/assets', 'public/imager', 'public/cpresources', 'storage/app', 'storage/logs', 'storage/backups', 'storage/rebrand', 'storage/userphotos', ]);

// Writable dirs by web server
set('writable_dirs', ['public/assets', 'public/imager', 'public/cpresources', 'storage', 'storage/app', 'storage/logs', 'storage/backups', 'storage/rebrand', 'storage/userphotos', 'storage/runtime']);

// Do not share anonymous data
set('allow_anonymous_stats', false);

host('hera.metanet.ch')
    ->user('chancedigi')
    ->forwardAgent(true)
    ->port(2121)
    ->stage('staging')
    ->set('deploy_path', '/www/staging');

host('stationx.ch')
    ->user('stationxch')
    ->forwardAgent(true)
    ->port(2121)
    ->stage('production')
    ->set('branch', 'main')
    ->set('deploy_path', '/www/production');

set('mysql', function () {
    return array(
        'host' => 'localhost',
        'port' => 3306,
        'schema' => getenv('DB_NAME'),
        'username' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD'),
        'dump_file' => 'db_dump_{{release_name}}.sql',
        'destination' => '{{deploy_path}}/shared/backups',
        'dump_options' => array('--skip-comments'),
    );
});

// Craft CMS
task('craft:migrate', 'cd {{release_path}} && {{bin/composer}} run post-deploy-cmd');

desc('Back up database');
task('db:backup', function () {

    $config = get('mysql');
    $host = $config['host'];
    $port = $config['port'];
    $schema = $config['schema'];
    $username = $config['username'];
    $password = $config['password'];
    $destination = $config['destination'];
    $file = $config['dump_file'];
    $opts = implode(' ', $config['dump_options']);

    run("mkdir -p {$destination}");
    run("mysqldump -h {$host} -P {$port} -u {$username} -p{$password} {$opts} {$schema} > {$destination}/{$file}");
});

desc('Craft CMS: Install Default');
task('craft:install', './craft install --interactive=0 --email="dev+craft-admin@dezentrum.ch" --username="admin" --password="secret" --siteName="{{application}}"');

// Build NPM
task('build:install', function () {
    runLocally('npm install');
}); // "npm ci" is available from npm 5.7.1
task('build:build', function () {
    runLocally('npm run build');
});
task('build:upload', function () {
    upload('web/dist', '{{release_path}}/web');
});

task('testing:run', function () {
    run('ls', ['tty' => false]);
});

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
//    'db:backup',
    'build:install',
    'build:build',
//    'build:cleanup',
    'build:upload',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'craft:install',
    'craft:migrate',
    'deploy:unlock',
    'cleanup',
    'success',
]);

task('load:env-vars', function () {
    $environment = run('cat {{deploy_path}}/shared/.env');
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->populate($dotenv->parse($environment));
});

before('deploy', 'load:env-vars');
before('rollback', 'load:env-vars');


// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

# Craft Starter Template

1. Create a new repo based on this template
1. Run `composer project-setup`

## Requirements

* PHP, composer, node, MySQL/MariaDB
* **Redis** is used for the Craft cache and Sessions
  → if Redis is unavailable, comment out the according config in `config/app.php` and `config/app.web.php`

## Setup

### Store licences in `.env`
After launching Craft, a `config/license.key` is generated.
Copy the content of the file to the `CRAFT_LICENSE_KEY` in `.env` and delete `config/license.key`.
Finally, uncomment the following line in `bootstrap.php`:
```php
define('CRAFT_LICENSE_KEY', getenv('CRAFT_LICENSE_KEY'));
```

In order to move plugin licences from the project config to the `.env` file,
copy the licence to a `.env` key and set the key as plugin licence, eg. `$PLUGIN_IMAGERX_LICENSE_KEY`.

### Choose swup or htmx/Sprig

Search for either `swup` or `htmx` and `hx-` in the code (and in `package.json`) and remove the code for the library
you're not using.

### Image Transforms

[Imager X](https://imager-x.spacecat.ninja/) is used to generate image transforms.
`IMAGER_TRANSFORMER` may be set to either `craft`, [`imgix`](https://imgix.com/) or [`imageboss`](https://imageboss.me/).

If you want to obfuscate the location of your assets (eg. when using imgix or imageboss as web proxy),
set the `@imagerBaseUrl` and `@imagerBasePath` in `config/general.php` and use them in the filesystem settings.

## Deployment
<details>
tbd.

After the first deployment, run:
```
composer install
composer storage:link
php craft setup
```

Fix issues with applying the craft config during deployment:
```
php craft project-config/rebuild
git reset --hard
php craft project-config/apply
```
</details>

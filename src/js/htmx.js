import 'htmx.org';
import 'htmx-progress';

document.body.addEventListener('htmx:timeout', function (evt) {
    if (evt.detail.requestConfig.boosted) {
        window.location = evt.detail.requestConfig.path;
    }
});

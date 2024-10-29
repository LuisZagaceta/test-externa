export class Notify {
    status = 400;
    config = {
        'delay': 5000,
        'beforeShow': function () {},
        'afterShow': function () {},
        'beforeHide': function () {},
        'afterHide': function () {}
    };
    icon = '';
    title = '';
    class = '';

    constructor(status, data) {
        this.status = parseInt(status);
        this.config = $.extend(this.config, data);

        this.init();
    }

    init() {
        if (!this.config?.message) {
            console.error('\'message\' is required.');

            return false;
        }

        this.setType();
        this.createToast();
    }

    setType() {
        switch (this.status) {
            case 400:
            case 401:
                this.icon = '<iconify-icon icon="mdi:warning" width="24" height="24" class="me-2"></iconify-icon>';
                this.title = 'WARNING';
                this.class = 'text-bg-warning';
                break;
            case 403:
            case 404:
                this.icon = '<iconify-icon icon="mdi:error" width="24" height="24" class="me-2"></iconify-icon>';
                this.title = 'ERROR';
                this.class = 'text-bg-danger';
                break;
            default:
                this.icon = '<iconify-icon icon="mdi:success-circle" width="24" height="24" class="me-2"></iconify-icon>';
                this.title = 'SUCCESS';
                this.class = 'text-bg-success';
                break;
        }
    }

    createToast() {
        let self = this;
        let $toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"></div>');
        $toast.addClass(this.class);

        let $header = $('<div class="toast-header"></div>');
        $header.append(this.icon);
        $header.append('<strong class="me-auto">' + this.title + '</strong>');
        $header.append('<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>');

        $header.appendTo($toast);

        let $body = $('<div class="toast-body"></div>');
        $body.append(this.config.message);

        $body.appendTo($toast);

        //Events
        $toast.on('show.bs.toast', function (ev) {
            self.config?.beforeShow();
        });

        $toast.on('shown.bs.toast', function (ev) {
            self.config?.afterShow();
        });

        $toast.on('hide.bs.toast', function (ev) {
            self.config?.beforeHide();
        });

        $toast.on('hidden.bs.toast', function (ev) {
            self.config?.afterHide();

            $toast.remove();
        });

        //Append Toast
        $('#toast-container').append($toast);

        $toast.toast(self.config).toast('show');
    }
}
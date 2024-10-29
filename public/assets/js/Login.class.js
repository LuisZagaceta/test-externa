import { Zagui } from "./Zagui.class.js";
import { Notify } from "./Notify.class.js";

export class Login extends Zagui {
    constructor(params) {
        super(params);

        this.init();
    }

    init() {
        let self = this;

        $(function () {
            self.events(self);
        });
    }

    events(self) {
        $('#login-form').on('submit', function (ev) {
            ev.preventDefault();

            self.formSubmit(this, self);

            return false;
        });
    }

    formSubmit(form, self) {
        let $form = $(form);
        let $inp_email = $('#inp-email');
        let $inp_password = $('#inp-password');
        let $btn = $('#btn-login');
        let $btn_icon = $btn.find('iconify-icon');

        let data = {
            'email': $inp_email.val(),
            'password': $inp_password.val()
        };

        $btn.attr('disabled', true);
        $btn_icon.attr('icon', 'svg-spinners:90-ring-with-bg');

        self.request('POST', './api/login', data).always(function () {
            $btn.attr('disabled', false);
            $btn_icon.attr('icon', 'mdi:send');
        }).done(function (response) {
            if (response?.success) {
                new Notify(200, $.extend(response, {
                    'delay': 1500,
                    'beforeHide': function () {
                        window.location.replace('./tareas');
                    }
                }));
            }
        });
    }
}
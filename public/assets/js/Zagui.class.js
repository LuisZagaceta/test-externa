import { Notify } from "./Notify.class.js";

export class Zagui {
    app = null;

    constructor(params) {
        this.app = params;

        this.initClass();
    }

    initClass() {
        let self = this;

        this.globalEvents(self);
    }

    /*
     * The Zagui base class is used by many other classes that, 
     * by extending it, are constantly executing the definition of the events. 
     * It is recommended to apply '.off(eventName)' before everything.
     */
    globalEvents(self) {
        $('#btn-logout').off('click').on('click', function (ev) {
            ev.preventDefault();

            self.logout(self);
        });
    }

    request(method, uri, data, headers) {
        let self = this;
        let csrf_header = self.app['csrf_header'];
        let csrf_hash = self.app['csrf_hash'];

        let header = $.extend({
            'X-CSRF-TOKEN': csrf_hash
        }, headers);

        return $.ajax({
            'url': uri,
            'method': method,
            'data': data,
            'headers': header
        }).always(function (data, textStatus, jqXHR) {
//            if (!!data?.readyState) {
//                jqXHR = data;
//            }
//
//            csrf_hash = jqXHR.getResponseHeader(csrf_header);
//
//            if (csrf_hash !== null) {
//                self.app['csrf_hash'] = csrf_hash;
//            }
        }).fail(self.failRequest);
    }

    failRequest(jqXHR, textStatus) {
        if (jqXHR?.responseJSON) {
            if (jqXHR?.responseJSON?.message) {
                return new Notify(jqXHR.status, jqXHR.responseJSON);
            }
        }

        return new Notify(400, {'responseJSON': 'Unexpected error.'});
    }

    logout(self) {
        self.request('GET', './api/logout').done(function (response) {
            if (response?.success) {
                new Notify(200, $.extend(response, {
                    'delay': 2000,
                    'beforeHide': function () {
                        window.location.replace('./manager/');
                    }
                }));
            }
        });
    }
}
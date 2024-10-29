import { Zagui } from "./Zagui.class.js";
import { Notify } from "./Notify.class.js";

export class Tareas extends Zagui {
    $datatable;

    constructor(params) {
        super(params);

        this.init();
    }

    init() {
        let self = this;

        $(function () {
            self.events(self);

            self.$datatable = $('#tareasTable').DataTable({
                ajax: {
                    url: './api/tareas',
                    type: 'GET'
                },
                columns: [
                    {data: 'id_tarea'},
                    {data: 'dni'},
                    {data: 'titulo'},
                    {data: 'descripcion'},
                    {data: 'fecha_vencimiento'},
                    {data: 'estado.estado'},
                    {
                        data: 'id_tarea',
                        className: 'text-center',
                        render: function (data, type, row, meta) {
                            return [
                                '<a href="./tareas/editar/' + data + '" class="btn-edit">Edit</a>',
                                '<a href="./api/tareas/delete/' + data + '" class="btn-delete">Delete</a>'
                            ].join(' | ');
                        }
                    }
                ],
                processing: true,
                serverSide: true
            });

        });
    }

    events(self) {
        $('.btn-nuevo').on('click', function (ev) {
            ev.preventDefault();

            $.ajax({
                'url': './tareas/nuevo',
                'method': 'GET'
            }).done(function (response) {
                self.mostrarEditModal(response, self);
            });
        });

        $('#tareasTable').on('click', '.btn-edit', function (ev) {
            ev.preventDefault();

            $.ajax({
                'url': this.href,
                'method': 'GET'
            }).done(function (response) {
                self.mostrarEditModal(response, self);
            });
        });

        $('#tareasTable').on('click', '.btn-delete', function (ev) {
            ev.preventDefault();

            $.ajax({
                'url': this.href,
                'method': 'DELETE'
            }).done(function (response) {
                self.actualizarTabla(response, self);
            });
        });

        let $modalContent = $('#modalContent');
        $modalContent.on('submit', '#form-tarea', function (ev) {
            ev.preventDefault();

            let $form = $(this);
            let data = $form.serializeArray();

            $.ajax({
                'url': $form.attr('action'),
                'method': 'POST',
                'data': data
            }).done(function (response) {
                self.actualizarTabla(response, self);
            });
        });
    }

    mostrarEditModal(response, self) {
        let $modal = $('#modalContent');
        $modal.empty().html(response);

        $modal.modal('show');
    }

    actualizarTabla(response, self) {
        let $modal = $('#modalContent');

        if (response?.success) {
            self.$datatable.ajax.reload();

            $modal.modal('hide');
        }
    }
}
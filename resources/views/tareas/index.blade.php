<!doctype html>
<html lang="en">
    <head>
        @include('chunks.head')

        <link href="https://cdn.datatables.net/v/bs5/dt-2.1.8/datatables.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container my-5">
            <button type="button" class="btn btn-success btn-nuevo mb-3">Nuevo</button>

            <table id="tareasTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>FECHA VENC.</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div id="modalContent" class="modal" tabindex="-1"></div>

        @include('chunks.scripts')

        <script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/datatables.min.js"></script>

        <script type="module">
            import { Tareas } from "./assets/js/Tareas.class.js";

            new Tareas({
                'csrf_hash': '<?= csrf_token() ?>'
            });
        </script>
    </body>
</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @include('layouts.styles')

    </head>
    <body class="body_app">

        <div id="app">

            @include('layouts.navbar')
            
            <main class="py-4">
                @yield('content')
            </main>
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="globalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="globalModalLabel" aria-hidden="true" style="z-index: 1400">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <form id="modalForm" action="" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="globalModalLabel">Título del Modal</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido del Modal
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Aceptar</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>

        @include('layouts.scripts')
        
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert-success').hide('slow');
                }, 3000);
            });
        </script>

        <script>
            new DataTable('#data-tables', {
                paging: true, // Habilitar paginación
                searching: true, // Habilitar búsqueda
                ordering: true, // Habilitar ordenamiento
                info: true, // Mostrar información de la tabla
                lengthChange: true, // Habilitar cambio de número de registros por página
                pageLength: 4, // Número de registros por página por defecto
                lengthMenu: [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
                language: {
                    search: "Buscar:", // Texto para el campo de búsqueda
                    lengthMenu: "Mostrar _MENU_ registros por página",
                    zeroRecords: "No se encontraron resultados",
                    info: "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros", // "Mostrando página _PAGE_ de _PAGES_ (_MAX_ registros en total)",
                    infoEmpty: "No hay registros disponibles",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "<i class='fas fa-angle-double-left'></i>",  // "Primero",
                        last: "<i class='fas fa-angle-double-right'></i>",  // "Último",
                        next: "<i class='fas fa-angle-right'></i>",  // "Siguiente",
                        previous: "<i class='fas fa-angle-left'></i>"  // "Anterior"
                    }
                }
            } );
        </script>

    </body>
</html>

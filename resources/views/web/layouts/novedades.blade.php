<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12">
                <div class="jumbotron panel-mujeres-libres">
                    <div class="container">
                        <p class="display-4 text-center mujeres-libres"> Novedades - Eventos y efemerides </p>
                    </div>
                </div>
                <table id="novedades" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Titulo</th>
                            <th>Opciones</th>                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Dia</th>
                            <th>Titulo</th>
                            <th>Opciones</th>  
                        </tr>
                    </tfoot>
                </table>
                <script type="text/javascript">
                    $(document).ready(function () {
                        var table = $('#novedades').DataTable({
                            dom: "Bfrtip",
                            columns: [
                                {
                                    className: 'details-control',
                                    orderable: false,
                                    data: null,
                                    defaultContent: ''
                                    
                                },
                                {data: "date_at"},
                                {data: "description"},
                            ],
                            order: [[1, 'asc']],
                            select: true,
                            buttons: [
                                {extend: "create", editor: editor}
                            ],
                            rowCallback: function (row, data, index) {
                                $('td:first-child', row).attr('title', 'Click to edit');
                            }
                        });
                    });
                </script>
            </div>
        </main>
    </body>
</html>
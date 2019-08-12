<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <main role="main">
            <div class="col-12">
                <div class="jumbotron panel-mujeres-libres">
                    <div class="container">
                        <br>
                        <p class="display-4 text-center mujeres-libres"> Asesorate </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>DEFAULT PANEL</h4> 
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="#" class="btn btn-default ">DEFAULT</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4>WARNING PANEL</h4> 
                    </div>
                    <div class="panel-body">

                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="#" class="btn btn-warning ">WARNING</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>INFO PANEL</h4> 
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </p>

                    </div>
                    <div class="panel-footer">
                        <a href="#" class="btn btn-danger ">DANGER</a>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function () {
        $("#filtarNoticias").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#noticias tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

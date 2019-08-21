<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <body>
        <div class="col-12 mujeres-libres">
            <h1 class="titulo-seccion bs-docs-featurette-title"> Informate </h1>
            <p class="slogan">Permite encontrar información sobre: Violencias de Género, Derechos y Recursos existentes, Educación Sexual Integral, a traves de contenidos interactivos y amigables.</p>
        </div>
        <br>
        <div class="col-12">
            <div id="accordion">
                <div class="card">
                    <a class="card-link card-header" data-toggle="collapse" href="#collapseOne" >
                        Tipos de violencia
                    </a>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>FÍSICA</h4>
                                    <p>Es la que se emplea contra tu cuerpo y produce dolor, daño o riesgo de producirlo.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>PSICOLÓGICA</h4>
                                    <p>Es aquella que causa daño emocional y disminución de la autoestima, perjudica y perturba el pleno desarrollo personal, o busca degradar o controlar tus acciones.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>SEXUAL</h4>
                                    <p>Cualquier acción que implique la vulneración en todas sus formas, con o sin acceso genital, de tu derecho a decidir voluntariamente tu vida sexual o reproductiva.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>ECONÓMICA Y PATRIARCAL</h4>
                                    <p>Es la que se dirige a ocasionar un menoscabo en tus recursos económicos o patrimoniales.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>SIMBÓLICA</h4>
                                    <p>La que a través de patrones estereotipados, mensajes, valores, íconos o signos transmita y reproduzca dominación, desigualdad y discriminación en las relaciones sociales.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <a class="collapsed card-link card-header" data-toggle="collapse" href="#collapseTwo">
                        Tipos de Modalidades
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>DOMÉSTICA</h4>
                                    <p>La ejercida por un integrante del grupo familiar.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>INSTITUCIONAL</h4>
                                    <p>La realizada por funcionarios, profesionales y personal de cualquier institución pública que retarde, obstaculice o impida el acceso a las políticas públicas y el ejercicio de tus derechos.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>OBSTÉTRICA, REPRODUCTIVA Y NO REPRODUCTIVA</h4>
                                    <p>La que te impide decidir libremente el número de embarazos o el intervalo entre los nacimientos y la que ejerce el personal de salud sobre tu cuerpo y los procesos reproductivos.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>LABORAL</h4>
                                    <p>La que en el ámbito del trabajo, genera diferencias basadas en el género como ser la remuneración desigual ante igual tarea o la imposibilidad de movilidad laboral.</p>
                                </li>
                                <li class="list-group-item">
                                    <h4>MEDIÁTICA</h4>
                                    <p>La que se ejercen medios de comunicación y publicidades, con mensajes y valores que reproducen la dominación, la desigualdad y la discriminación en las relaciones sociales.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <a class="card-link card-header" data-toggle="collapse" href="#collapseThree">
                        Tus derechos
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">La gratuidad de las actuaciones judiciales y del patrocinio jurídico preferentemente especializado.</li>
                                <li class="list-group-item">Protección de tu intimidad, garantizando la confidencialidad de las actuaciones.</li>
                                <li class="list-group-item">Recibir un trato humanizado, evitando la revictimización.</li>
                                <li class="list-group-item">La amplitud probatoria para acreditar los hechos denunciados.</li>
                                <li class="list-group-item">Oponerte a la realización de inspecciones sobre tu cuerpo por fuera de la orden judicial.</li>
                                <li class="list-group-item">Contar con mecanismos eficientes para denunciar a los funcionarios por el incumplimiento.</li>
                                <li class="list-group-item">Solicitar asistencia integral y acompañamiento de un equipo especializado.</li>
                                <li class="list-group-item">Prohibición de mediaciones y conciliaciones con la persona que ejerce violencia.</li>
                                <li class="list-group-item">Solicitar medidas preventivas urgentes: exclusión y/o restricción perimetral, botón de alerta, restitución de bienes y personas, régimen de alimentos y de cuidados personales.</li>                                
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <a class="card-link card-header" data-toggle="collapse" href="#collapseFour">
                        Otros sitios de interes
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-12">
                                <table class="table table-striped w-auto table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            @if (Auth::check())
                                            <th class="d-none d-print-block" scope="col">Id</th>
                                            <th scope="col">Título</th>
                                            <th scope="col">Sitio web</th>
                                            <th scope="col">Opciones</th>
                                            @else
                                            <th scope="col">Título</th>
                                            <th scope="col">Sitio web</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody id="digitecas">
                                        @foreach($digitecas as $k => $digiteca)
                                        <tr>
                                            @if (Auth::check())
                                            <td>{{ $digiteca['name'] }}</td>
                                            <td>{{ $digiteca['web_site'] }}</td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm" href="{{ route('agregar-digiteca') }}" role="button" title="Agregar"><span class="glyphicon glyphicon-plus"></span></a>
                                                <a class="btn btn-secondary btn-sm" href="{{ route('editar-digiteca', $digiteca['id']) }}" role="button" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                                {{ Form::open(['route' => ['eliminar-digiteca', $digiteca['id']], 'method' => 'delete']) }}
                                                <button type="submit" class="btn btn-secondary btn-sm">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>    
                                                {{ Form::close() }}
                                            </td>                            
                                            @else
                                            <td>{{ $digiteca['name'] }}</td>
                                            <td>{{ $digiteca['web_site'] }}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <br>
    <div class='row'>
        <div class="col-md-12 text-center">
            <a class="btn btn-secondary" href="{{ route('inicio') }}" role="button">Volver</a>
        </div>
    </div>
    <br><br><br><br>
</body>
</html>


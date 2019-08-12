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
                            <h4>FÍSICA</h4>
                            <p>Es la que se emplea contra tu cuerpo y produce dolor, daño o riesgo de producirlo.</p>
                            <h4>PSICOLÓGICA</h4>
                            <p>Es aquella que causa daño emocional y disminución de la autoestima, perjudica y perturba el pleno desarrollo personal, o busca degradar o controlar tus acciones.</p>
                            <h4>SEXUAL</h4>
                            <p>Cualquier acción que implique la vulneración en todas sus formas, con o sin acceso genital, de tu derecho a decidir voluntariamente tu vida sexual o reproductiva.</p>
                            <h4>ECONÓMICA Y PATRIARCAL</h4>
                            <p>Es la que se dirige a ocasionar un menoscabo en tus recursos económicos o patrimoniales.</p>
                            <h4>SIMBÓLICA</h4>
                            <p>La que a través de patrones estereotipados, mensajes, valores, íconos o signos transmita y reproduzca dominación, desigualdad y discriminación en las relaciones sociales.</p>
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
                            <h4>DOMÉSTICA</h4>
                            <p>La ejercida por un integrante del grupo familiar.</p>
                            <h4>INSTITUCIONAL</h4>
                            <p>La realizada por funcionarios, profesionales y personal de cualquier institución pública que retarde, obstaculice o impida el acceso a las políticas públicas y el ejercicio de tus derechos.</p>
                            <h4>OBSTÉTRICA, REPRODUCTIVA Y NO REPRODUCTIVA</h4>
                            <p>La que te impide decidir libremente el número de embarazos o el intervalo entre los nacimientos y la que ejerce el personal de salud sobre tu cuerpo y los procesos reproductivos.</p>
                            <h4>LABORAL</h4>
                            <p>La que en el ámbito del trabajo, genera diferencias basadas en el género como ser la remuneración desigual ante igual tarea o la imposibilidad de movilidad laboral.</p>
                            <h4>MEDIÁTICA</h4>
                            <p>La que se ejercen medios de comunicación y publicidades, con mensajes y valores que reproducen la dominación, la desigualdad y la discriminación en las relaciones sociales.</p>
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
                            <p>La gratuidad de las actuaciones judiciales y del patrocinio jurídico preferentemente especializado.</p>
                            <p>Protección de tu intimidad, garantizando la confidencialidad de las actuaciones.</p>
                            <p>Recibir un trato humanizado, evitando la revictimización.</p>
                            <p>La amplitud probatoria para acreditar los hechos denunciados.</p>
                            <p>Oponerte a la realización de inspecciones sobre tu cuerpo por fuera de la orden judicial.</p>
                            <p>Contar con mecanismos eficientes para denunciar a los funcionarios por el incumplimiento.</p>
                            <p>Solicitar asistencia integral y acompañamiento de un equipo especializado.</p>
                            <p>Prohibición de mediaciones y conciliaciones con la persona que ejerce violencia.</p>
                            <p>Solicitar medidas preventivas urgentes: exclusión y/o restricción perimetral, botón de alerta, restitución de bienes y personas, régimen de alimentos y de cuidados personales.</p>
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
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</body>
</html>


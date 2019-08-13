<!DOCTYPE html>
<html lang="en">
    @include('web.partials.head') 
    @include('web.partials.nav')
    <br>
    <br>
    <br>
    <body>
        <div id="register">
            <div class="container">
                <div id="register-row" class="row justify-content-center align-items-center">
                    <div id="register-column" class="col-md-6">
                        <div id="register-box" class="col-md-12">
                            <br>
                            <h3 class="text-center text-info">Tú Perfil</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-info">Nombre de usuario</label>
                                <input class="form-control" name="username" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="contraseña" class="text-info">Contrase&ntilde;a</label>
                                <input class="form-control" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="repetir-contraseña" class="text-info">Vuelva a ingresar la contrase&ntilde;a</label>
                                <input class="form-control" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="nombre-apellido" class="text-info">Nombre y apellido</label>
                                <input class="form-control" name="nombre-apellido" type="text" value="" id="nombre-apellido">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label>
                                <input class="form-control" name="email" type="text" value="" id="email">
                            </div>
                            <div class="form-group">
                                <label for="barrio" class="text-info">Barrio</label>
                                <input class="form-control" name="barrio" type="text" value="" id="barrio">
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="text-info">Direcci&oacute;n</label>
                                <input class="form-control" name="direccion" type="text" value="" id="direccion">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="text-info">Telefono</label>
                                <input class="form-control" name="telefono" type="text" value="" id="telefono">
                            </div>
                            <div class="form-group">
                                <label for="celular" class="text-info">Celular</label>
                                <input class="form-control" name="celular" type="text" value="" id="celular">
                            </div>
                            <div id="register-link" class="text-right">
                                <a class="btn btn-secondary" href="http://restapisfm" role="button">Cancelar</a>
                                <input class="btn btn-info btn-md" type="submit" value="Enviar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

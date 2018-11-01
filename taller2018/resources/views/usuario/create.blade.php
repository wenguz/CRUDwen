@extends('layout.main')

@section('content')
<!-- start: content -->
<!--es el diseño del formulario obtenido de la plantilla form elemnet -->
<div id="content">
    <!--Pertenece al formulario basic element de la plantilla--->
    <div class="panel-heading">
        <h4>Registrar Usuario</h4>
        @if(Session::has('message'))
            <div>{{Session::get('message')}}</div>
        @endif
    </div>
    <class="panel-body" style="padding-bottom:30px;">
    <!--Define la ruta para almacenar los datos de este formulario. Llama al metodo store de users definido en ControllerUsers. Que debe tener una ruta definida en routes,web -->
        <form method="POST" action="{{ route('users.store')}}" role="form">

            <!--Proteccion CSRF. Token para verificar que el usuario autenticado es el que realiza la solicitud-->
            {{ csrf_field() }}

        <div class="col-md-12">
            <div class="form-group"><label class="col-sm-2 control-label text-right">Nombre</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="nombre_usu"></div>
            </div>
            <br>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Apellido</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="apellido_usu"></div>
            </div>
            <br>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Telefono</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="telefono_usu"></div>
            </div>
            <br>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Email</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="email_usu"></div>
            </div>
            <br>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Tipo de documento</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="tipodoc_usu" required placeholder="Ingrese un tipo de documento de identificasion"></div>
            </div>
            <br>
            <div class="form-group"><label class="col-sm-2 control-label text-right">No de documento</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="numdoc_usu" required pattern="[0-9]" placeholder="Ingrese el nuemero de documento de identificasion"></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Contraseña</label>
                <div class="col-sm-10"><input type="password" class="form-control" name="password_usu" required placeholder="Ingrese una contraseña"></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label text-right">Estado</label>
                <div class="col-sm-10">
                    <div class="col-sm-12 padding-0">
                        <select class="form-control" name="status_usu">
                            <option value="Activo">Activo</option>
                            <option value="Desactivado">Desactivado</option>
                        </select>
                    </div>
                </div>
            </div>
            <input  class="submit btn btn-danger" type="submit" value="Registrar">
        </div>
        </form>
    </div>
</div>
<!-- end: content -->
    @endsection
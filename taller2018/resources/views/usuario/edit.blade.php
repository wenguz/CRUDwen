@extends('layout.main')

@section('content')
    <!-- start: content -->
    <!--es el diseño se copio del registrar usuario: create.blade-->
    <div id="content">
        <!--Pertenece al formulario basic element de la plantilla--->
        <div class="panel-heading">
            <h4>Editar Usuario</h4>
        </div>
        <class="panel-body" style="padding-bottom:30px;">
        <!--Define la ruta para editar los datos de este formulario. Llama al metodo updat de users definido en ControllerUsers. Que debe tener una ruta definida en routes,web
        Se capturan los datos del formulario que corresponden al id_users-->
        <form method="POST" action="{{ route('users.update',$eusuarios->id_users)}}" role="form">
            <!--Proteccion CSRF. Token para verificar que el usuario autenticado es el que realiza la solicitud-->
            {{ csrf_field() }}

            <div class="col-md-12">
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group"><label class="col-sm-2 control-label text-right">Nombre</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre_usu" value="{{ $eusuarios->users_name }}"></div>  <!--se agregar value con el nombre del campo en la bd para que lo jale -->
                </div>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Apellido</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="apellido_usu" value="{{ $eusuarios->users_lastname }}"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Telefono</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="telefono_usu" value="{{ $eusuarios->users_phone }}"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label text-right">Email</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="email_usu" value="{{ $eusuarios->users_email }}"></div>
                </div>
                <br>
                <div class="form-group"><label class="col-sm-2 control-label text-right">Tipo de documento</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="tipodoc_usu" value="{{ $eusuarios->users_type_doc }}" required></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label text-right">No de documento</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="numdoc_usu" value="{{ $eusuarios->users_doc_number }}" required></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label text-right">Contraseña</label>
                    <div class="col-sm-10"><input type="password" class="form-control" name="password_usu" value="{{ $eusuarios->users_password }}" required></div>
                </div>
                <!--
                <div class="form-group"><label class="col-sm-2 control-label text-right">Estado</label>
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding-0">
                            <select class="form-control" name="status_usu" value="{{ $eusuarios->users_status }}">
                                <option value="Activo">Activo</option>
                                <option value="Desactivado">Desactivado</option>
                            </select>
                        </div>
                    </div>
                </div>
                -->
                <input  class="submit btn btn-danger" type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
    <!-- end: content -->

@endsection

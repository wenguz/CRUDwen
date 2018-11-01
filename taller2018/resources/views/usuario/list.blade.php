@extends('layout.main')
@section('content')

    @if(Session::has('message'))
        <div>{{Session::get('message')}}</div>
    @endif

    <div id="content">
    <div class="row">
        <section class="content">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Usuarios</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('users.store')}}" class="btn btn-info" >Añadir Usuario</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Tipo Documento</th>
                                <th>Numero documento</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                @if($lista_usu->count())
                                    @foreach($lista_usu as $lista)
                                        <tr>
                                            <td>{{$lista->id_users}}</td>
                                            <td>{{$lista->users_name}}</td>
                                            <td>{{$lista->users_lastname}}</td>
                                            <td>{{$lista->users_phone}}</td>
                                            <td>{{$lista->users_email}}</td>
                                            <td>{{$lista->users_type_doc}}</td>
                                            <td>{{$lista->users_doc_number}}</td>
                                            <td>{{$lista->users_status}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('ControllerUsers@edit', $lista->id_users)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('ControllerUsers@destroy', $lista->id_users)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registros !!</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $lista_usu->links() }}
                </div>

        </section>

@endsection
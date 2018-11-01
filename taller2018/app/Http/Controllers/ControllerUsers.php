<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ControllerUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //llama la vista obtenida del index del diseño usado. que se encuentra en view, usuario create.blade.php

        return view('usuario.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*Listado de usaurios, se reemplazo la funcion create*/
    public function list()
    {
        //query builder
        $lista_usu=DB::table('users')
            ->where('users_status','=','Activo')
            ->orWhereNull('deleted_at')
            ->orderBy('id_users','desc')
            ->paginate(2);

        return view('usuario.list',compact('lista_usu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*En validate se ponene los name del formualrio create.blade que son obligatorios Eloquent*/
        $request->validate([
          'email_usu'=>'required',
          'tipodoc_usu'=>'required',
          'numdoc_usu'=>'required',
          'password_usu'=>'required',
          'status_usu'=>'required'
        ]);

        $dusuario = new User;
        $dusuario->users_name = $request->input('nombre_usu');
        $dusuario->users_lastname = $request->input('apellido_usu');
        $dusuario->users_phone = $request->input('telefono_usu');
        $dusuario->users_email = $request->input('email_usu');
        $dusuario->users_type_doc = $request->input('tipodoc_usu');
        $dusuario->users_doc_number = $request->input('numdoc_usu');
        $dusuario->users_password = $request->input('password_usu');
        $dusuario->users_status = $request->input('status_usu');
        if ($dusuario!=null){
            $dusuario->save();
            Session::flash('message','Registro exitoso');
        }
        else{
            Session::flash('message','Llene los campos faltantes');
        }

        //return redirect()->action('ControllerUsers@list');

 return redirect()->action('ControllerUsers@list');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscara por id del usuario para editar los datos. mandado del formualrio de list
        $eusuarios=User::find($id);
        if ($eusuarios!=null){
            return view('usuario.edit',compact('eusuarios'));
        }
        else{
            Session::flash('message','El usuario fue desactivado');
            return redirect()->action('ControllerUsers@list');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dusuario=User::find($id);
        $dusuario->users_name = $request->input('nombre_usu');
        $dusuario->users_lastname = $request->input('apellido_usu');
        $dusuario->users_phone = $request->input('telefono_usu');
        $dusuario->users_email = $request->input('email_usu');
        $dusuario->users_type_doc = $request->input('tipodoc_usu');
        $dusuario->users_doc_number = $request->input('numdoc_usu');
        $dusuario->users_password = $request->input('password_usu');
       // $dusuario->users_status = $request->input('status_usu');
        $dusuario->save();

        return redirect()->action('ControllerUsers@list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)  //
    {

       $us=User::find($id);
       if ($us!=null){
           $us->users_status = 'Desactivado';
           $us->save();
           $us->delete();
           Session::flash('message','Eliminasion exitosa');
           return redirect()->action('ControllerUsers@list');//->with(['message'=>'Eliminasio existosa']);
       }
        Session::flash('message1','o se pudo eliminar el registro');
        return redirect()->action('ControllerUsers@list');//->with(['message'=>'No se pudo eliminar el registro']);


/*
      $user=User::find($id);
        $user->users_status='Desactivado';
        $user->save();
        $user->delete();
        return redirect()->action('ControllerUsers@list');
*/
    }
}

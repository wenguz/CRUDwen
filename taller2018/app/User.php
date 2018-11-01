<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_users','users_name','users_lastname','users_phone','users_email', 'users_type_doc', 'users_doc_number','users_password','users_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'users_password', 'remember_token',
    ];
/*Se debe cambiar el nombre de la llave primaria de id a la definida en la BD*/
    protected $primaryKey='id_users';

    /*Para la eliminasion*/
    protected $dates=['deleted_at'];

}

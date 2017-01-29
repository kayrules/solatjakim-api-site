<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//-- Passport
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
// class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
// class User extends Authenticatable
{
    // use Authenticatable, CanResetPassword;
    use Authenticatable, HasApiTokens, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'username'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}

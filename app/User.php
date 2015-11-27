<?php

namespace App;

use App\Client;
use App\Project;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('name', 'username', 'email', 'password', 'register_ip');
	protected $visible = array('name', 'username', 'email', 'register_ip');	

	public function clients()
	{
		return $this->hasMany('App\Client', 'owner_id');
	}	

	public function projects()
	{
		return $this->hasMany('App\Project', 'owner_id');
	}

	public function organizations()
	{
		return $this->belongsToMany('\Organization');
	}

}
<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function role()
	{
		return $this->belongsToMany(Role::class);
	}

	public function authorizeRole($role)
	{
		return $this->hasRole($role);
	}

	public function hasRole($role)
	{
		return null !== $this->role()->where('name', $role)->first();
	}

	public function feedbacks()
	{
		return $this->hasMany(Feedback::class);
	}
}

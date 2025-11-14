<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cafe extends Authenticatable
{
	use HasFactory, Notifiable, HasApiTokens;

	protected $fillable = [
		'name',
		'email',
		'password',
		'description',
		'phone',
		'address',
		'address_link',
		'insta_name',
		'insta_link',
		'opening_time',
		'closing_time',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected function casts(): array
	{
		return [
			'password' => 'hashed',
		];
	}
}

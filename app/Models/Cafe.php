<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'phone',
		'address',
		'address_link',
		'insta_name',
		'insta_link',
		'opening_time',
		'closing_time',
	];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'status',
		'product_info',
		'description',
	];
}

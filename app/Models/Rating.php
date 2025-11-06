<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'order_number',
		'service_rating',
		'product_rating',
		'ambiance_rating',
		'return_response',
		'comment',
	];
}

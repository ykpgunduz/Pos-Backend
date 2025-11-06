<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastItem extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'order_number',
		'product_id',
		'quantity',
		'price',
	];
}

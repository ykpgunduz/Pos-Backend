<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'table_number',
		'order_number',
		'product_id',
		'product_price',
		'note',
		'quantity',
		'status',
	];
}

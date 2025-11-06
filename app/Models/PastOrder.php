<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastOrder extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'order_number',
		'table_number',
		'customer',
		'total_amount',
		'net_amount',
		'cash',
		'card',
		'iban',
		'treat',
		'self_treat',
	];
}

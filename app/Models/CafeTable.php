<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeTable extends Model
{
	use HasFactory;

	protected $table = 'tables';

	protected $fillable = [
		'cafe_id',
		'table_number',
		'order_number',
		'customer',
		'status',
		'treat',
		'total_amount',
	];
}

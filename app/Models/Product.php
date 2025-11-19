<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'category_id',
		'image',
		'name',
		'description',
		'price',
		'cost',
		'stock',
		'active',
		'star',
	];

	protected $casts = [
		'price' => 'decimal:2',
		'cost' => 'decimal:2',
		'active' => 'boolean',
	];

	/**
	 * Ürünün ait olduğu kategori ilişkisi
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Ürünün ait olduğu kafe ilişkisi
	 */
	public function cafe()
	{
		return $this->belongsTo(Cafe::class);
	}
}

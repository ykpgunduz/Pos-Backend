<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	protected $fillable = [
		'cafe_id',
		'icon',
		'color',
		'name',
	];

	/**
	 * Kategoriye ait ürünler ilişkisi
	 */
	public function products()
	{
		return $this->hasMany(Product::class);
	}

	/**
	 * Kategorinin ait olduğu kafe ilişkisi
	 */
	public function cafe()
	{
		return $this->belongsTo(Cafe::class);
	}
}

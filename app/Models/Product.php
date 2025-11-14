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
		'stock',
		'active',
		'star',
	];

	// İlişkilerin otomatik yüklenmesini engelle
	protected $hidden = [];

	// Relationships
	public function cafe()
	{
		return $this->belongsTo(Cafe::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}

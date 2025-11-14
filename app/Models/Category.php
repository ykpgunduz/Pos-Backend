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

	// Eğer products ilişkisi varsa, JSON'da otomatik yüklenmesini engelle
	protected $hidden = [];

	// Relationships
	public function cafe()
	{
		return $this->belongsTo(Cafe::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}

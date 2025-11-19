<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableDefinition extends Model
{
    use HasFactory;

    protected $fillable = [
        'cafe_id',
        'name',
        'area',
        'table_number',
        'capacity',
        'position_x',
        'position_y',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // İlişkiler
    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }
}

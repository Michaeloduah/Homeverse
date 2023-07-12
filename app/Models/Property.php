<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array'
    ];

    
    // protected $columnArray = Property::pluck('images')->toArray();

    public function user() {
        return $this->belongsTo(User::class);
    }
}

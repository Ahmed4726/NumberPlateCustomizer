<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'plate_text', 'plate_type', 'plate_border',
        'plate_flag', 'plate_style', 'front_image', 'rear_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


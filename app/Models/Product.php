<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define which fields are mass assignable
    protected $fillable = [
        'name',
        'description',
        'pair_price',
        'back_plate_price',
        'front_plate_price',
    ];
}

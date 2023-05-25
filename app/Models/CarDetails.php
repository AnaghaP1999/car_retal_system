<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDetails extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'id',
        'name',
        'owner',
        'color',
        'rent',
        'car_number'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDetails extends Model
{
    use HasFactory;
    protected $table = 'driver_details';
    protected $fillable = [
        'id',
        'car_id',
        'name',
        'email',
        'phone',
        'age'
        
    ];
}

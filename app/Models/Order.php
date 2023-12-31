<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'car_id',
        'rent_date',
        'return_date',
        'created_at',
    ];

    public function return_car()
    {
        return $this->hasOne(CarReturn::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function carReturn()
    {
        return $this->hasOne(CarReturn::class, 'order_id', 'id');
    }

}

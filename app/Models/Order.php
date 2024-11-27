<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_adress',
        'shipping_name',
        'shipping_email',
     
        'shipping_adress',
        'shipping_phone',
        'status_delivery',
        'status_payment',

    ];

    public function orderItems(){
        $this->hasMany(OrderItem::class);
    }

}

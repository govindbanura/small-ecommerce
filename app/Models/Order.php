<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'tracking_id',
        'fname',
        'lname',
        'email',
        'mobile',
        'address1',
        'address2',
        'country',
        'city',
        'state',
        'pincode',
        'status',
        'message',
        'user_id'
    ];
}

<?php

namespace App\Models;
use App\Models\OrderItems;
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
        'total_price',
        'user_id'
    ];
    public function orderItems(){
        return $this->hasMany(OrderItems::class);
    }
}

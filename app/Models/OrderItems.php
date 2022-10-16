<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
            'product_id',
            'product_qty',
            'product_price',
    ];
    public function order(){
        return $this->belongsTo(Order::class, 'order_id','id');
    }
}

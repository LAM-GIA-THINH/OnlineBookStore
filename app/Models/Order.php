<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'address',
        'name',
        'phone',
        'order_status',
        'payment_method',
        'payment_status',
        'sub_total',
        'tax',
        'shipping',
        'tracking',
        'amount',
        'note',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salebilling extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'medicine_id',
        'quantity',
        'discount',
        'price',
        'total_price',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'medicine_id');
    }
    public function paygate()
    {
        return $this->belongsTo(Paygate::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

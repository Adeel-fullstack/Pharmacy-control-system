<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 'customer_id', 'total_bill', 'discount', 'amount', 'status', 'payment_method' ];

    public function salebillings()
    {
        return $this->hasMany(Salebilling::class, 'customer_id', 'customer_id');
    }
    public function payment()
{
    return $this->belongsTo(Paygate::class, 'payment_method');
}
public function customer()
{
    return $this->belongsTo(Customer::class);
}

}


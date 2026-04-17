<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'quantity',
        'sale_price',
        'purchase_price',
        'discount',
        'date_of_sale',
        'customer_id',
    ];
    public function stock(){
        return $this->belongsTo(Stock::class, 'medicine_id');
    }
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id');
}
}

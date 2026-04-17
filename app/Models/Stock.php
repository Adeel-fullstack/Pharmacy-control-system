<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicinelogo','barcode','medicineName','type', 'packaging_type','distributor_id','company_id','quantity', 'maxDiscount', 'number_of_boxes','items_per_box','total_items','purchase_price_box','purchase_price_each','sale_price_box',
        'sale_price_each','tablets_per_blister','purchase_price_blister','sale_price_blister', 
    ];
    public function company(){
        return $this->belongsTo(company::class);       
    }
    public function distributor(){
        return $this->belongsTo(distributor::class);
    }
    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}

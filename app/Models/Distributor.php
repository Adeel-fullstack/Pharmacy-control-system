<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'distributor_name',
        'distributor_email',
        'contact_person',
        'phone',
        'address',
    ];
    public function company(){
        return $this->belongsTo(company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generale extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'email',
        'whatsapp',
        'landline',
        'address',
        'website',
    ];
}

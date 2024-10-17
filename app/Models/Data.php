<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'peserta_d_b_s',
        'name_customer',
        'total_price,',
    ];
}

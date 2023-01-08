<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wattmeter extends Model
{
    use HasFactory;

    protected array $fillable = [
        'device',
        'timestamp',
        'tarrif',
        'T1Imp',
        'T2Imp',
        
    ]
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class breeding_number extends Model
{
    protected $table = 'breeding_number';
    protected $fillable = [
        'breeding_number',
        'member_id',
    ];
}

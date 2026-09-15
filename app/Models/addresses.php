<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'street',
        'house_number',
        'postal_code',
        'city',
    ];
}

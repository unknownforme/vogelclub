<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'member_type_id',
        'address_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'nbvv_number',
        'is_active',
    ];
}

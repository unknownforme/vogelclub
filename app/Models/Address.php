<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['street', 'house_number', 'postal_code', 'city'];

    public function member()
    {
        return $this->hasOne(Member::class);
    }
}

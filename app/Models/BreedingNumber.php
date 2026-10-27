<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedingNumber extends Model
{
    use HasFactory;

    protected $table = 'breeding_numbers';

    protected $fillable = ['breeding_number', 'member_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

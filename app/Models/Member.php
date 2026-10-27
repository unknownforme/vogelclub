<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'members';

    protected $fillable = [
        'member_type_id',
        'address_id',
        'first_name',
        'last_name',
        'birth_date',
        'nbvv_number',
        'is_active'
    ];

    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function breedingNumbers()
    {
        return $this->hasMany(BreedingNumber::class);
    }
}

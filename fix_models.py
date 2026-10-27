
import os

project_dir = r'C:\Users\unknown\Documents\school\vogelclub'

models = {
    'app/Models/Address.php': '''<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;
use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'street',
        'house_number',
        'postal_code',
        'city',
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
''',
    'app/Models/BreedingNumber.php': '''<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\Model;
use Illuminate\\Database\\Eloquent\Factories\\HasFactory;

class BreedingNumber extends Model
{
    use HasFactory;

    protected $table = 'breeding_numbers';
    protected $fillable = [
        'breeding_number',
        'member_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
''',
    'app/Models/MemberType.php': '''<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\Model;
use Illuminate\\Database\\Eloquent\Factories\\HasFactory;

class MemberType extends Model
{
    use HasFactory;

    protected $table = 'member_types';
    protected $fillable = [
        'name',
        'price',
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
''',
    'app/Models/Member.php': '''<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\Model;
use Illuminate\\Database\\Eloquent\Factories\\HasFactory;
use Illuminate\\Database\\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

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
'''
}

for rel_path, content in models.items():
    full_path = os.path.join(project_dir, rel_path)
    print(f"Writing {full_path}")
    with open(full_path, 'w') as f:
        f.write(content)

print("All models written successfully.")

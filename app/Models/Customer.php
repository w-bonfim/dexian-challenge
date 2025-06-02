<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'complement',
        'neighborhood',
        'zip_code'
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'address',
        'account_holder',
        'account_number',
        'bank_name',
        'branch_name',
        'city',
        'about',
        'date',
        'photo',
    ];
}

<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'address_line_one',
        'address_line_two',
    ];

    protected $casts = [
        'gender' => Gender::class,
        // 'address' => Address::class.':argument',
        'address' => Address::class,
    ];
}

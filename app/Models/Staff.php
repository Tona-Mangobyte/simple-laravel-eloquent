<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ValueObjects\Address as AddressValueObject;

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
        // 'address' => Address::class, // ============ CASTING 2-WAY=================
    ];



    // ============ CASTING 1-WAY=================
    /**
     * Interact with the staff's address.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => new AddressValueObject(
                $attributes['address_line_one'],
                $attributes['address_line_two'],
            ),
            set: fn (AddressValueObject $value) => [
                'address_line_one' => $value->lineOne,
                'address_line_two' => $value->lineTwo,
            ],
        );
    }
}

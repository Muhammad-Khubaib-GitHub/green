<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Container extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'country_id',
        'ship_address',
        'user_id',
        'processing_date',
        'return_date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function investor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

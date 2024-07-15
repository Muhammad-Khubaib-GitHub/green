<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'amount', 'profit', 'container_id', 'return_date', 'processing_date', 'user_id'
    ];

    public function container()
    {
        return $this->belongsTo(Container::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

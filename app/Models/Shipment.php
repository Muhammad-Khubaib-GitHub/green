<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'amount', 'profit', 'container_id', 'return_date', 'processing_date', 'current_date', 'user_id'
    ];

    /**
     * Get the container that owns the shipment.
     */
    public function container()
    {
        return $this->belongsTo(Container::class, 'container_id');
    }

    /**
     * Get the user that owns the shipment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the shipment with container cycle.
     */
    public function containerUsers()
    {
        return $this->belongsToMany(User::class, 'container_users')
                    ->withPivot('user_container_cycle');
    }
}

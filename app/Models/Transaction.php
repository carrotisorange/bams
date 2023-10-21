<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    public $timestamps = false;

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function pet(){
        return $this->belongsTo(Pet::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    protected $attributes = [
        'location_id' => '14'
    ];

    protected $fillable = [
        'service_id',
        'date',
        'amount',
        'pet_id',
        'owner_id',
        'location_id'
    ];
}

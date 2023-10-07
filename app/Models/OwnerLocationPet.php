<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerLocationPet extends Model
{
    use HasFactory;

    protected $table = 'owners_locations_pets';

    public $timestamps = false;
}

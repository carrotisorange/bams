<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'pet_category_id',
        'date_of_death'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public $timestamps = false;

    protected $fillable = [
        'owner_id',
        'transaction_id',
        'created_at',
        'updated_at',
        'amount',
        'mode_of_payment_id',
        'status'
    ];

}

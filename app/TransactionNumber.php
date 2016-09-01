<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionNumber extends Model
{
    protected $fillable = [
        'transaction_number',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'transaction_number_id';
}

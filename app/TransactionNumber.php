<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionNumber extends Model
{
    protected $fillable = [
        'transaction_number',
        'status'
    ];

    protected $primaryKey = 'transaction_number_id';
}

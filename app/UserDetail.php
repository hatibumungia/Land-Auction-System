<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    protected $table = 'user_details';

    protected $primaryKey = 'user_detail_id';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email_address',
        'phone_number',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}

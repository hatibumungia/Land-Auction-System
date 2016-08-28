<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCredential extends Model
{
    protected $table = 'user_credentials';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password',
        'user_detail_id',
    ];

    protected $hidden = [
        'password'
    ];
}

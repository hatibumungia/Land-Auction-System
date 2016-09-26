<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Hash;

class UserCredential extends Model
{
    protected $table = 'user_credentials';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password',
        'user_detail_id',
    ];

    public static function checkLogin($username, $password)
    {
        $user = UserCredential::whereUsername($username)->first();

        if (!$user) {
            return null;
        }

        if (Hash::check($password, $user->password)) {
            return $user;
        } else {
            return null;
        }
    }

}

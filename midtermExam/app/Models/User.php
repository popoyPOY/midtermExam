<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    public $timestamps = false;

    protected $table = 'tblteacher';

    protected $fillable = [
        'lastname', 'firstname', 'middlename', 'bday', 'age'
    ];
}
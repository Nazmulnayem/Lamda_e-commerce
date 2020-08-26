<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRegister extends Model
{
    protected $fillable=['name','phone_number','email','password','address',];
}

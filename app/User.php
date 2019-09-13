<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
   public $timestamps = false;
   protected $table = "users";
}

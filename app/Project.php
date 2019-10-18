<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   public $timestamps = false;
   protected $table = "projects";

   public function admin_user()
    {
        return $this->belongsTo("App\User", "user_id" );
    }
}

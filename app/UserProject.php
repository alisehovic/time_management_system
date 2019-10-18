<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
   public $timestamps = false;
   protected $table = "users_project";

   public function user()
    {
        return $this->belongsTo("App\User", "user_id" );
    }
    public function project()
    {
        return $this->belongsTo("App\Project", "project_id" );
    }
}

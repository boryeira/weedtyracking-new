<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  
  public function growlogs()
  {
      return $this->belongsToMany('App\Models\Growlogs\Growlog', 'growlog_stage');
  }
}

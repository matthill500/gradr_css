<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public function college(){
    return $this->belongsTo('App\College');
  }

  public function category(){
    return $this->belongsTo('App\Category');
  }

}

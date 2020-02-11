<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswersGeneral extends Model
{
  public function student(){
    return $this->belongsTo('App\Student');
  }
  public function question(){
    return $this->belongsTo('App\questionsGeneral');
  }
}

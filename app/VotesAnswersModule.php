<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotesAnswersModule extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function answer(){
    return $this->belongsTo('App\answersModule');
  }
}

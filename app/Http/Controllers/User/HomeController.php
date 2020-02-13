<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\College;
use App\QuestionsGeneral;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:user');
  }

  public function index(){
    $colleges = College::all();
    $questionsGenerals = QuestionsGeneral::all();
    
    return view('user.home')->with([
      'colleges' => $colleges,
      'questionsGenerals' => $questionsGenerals
    ]);
  }
}

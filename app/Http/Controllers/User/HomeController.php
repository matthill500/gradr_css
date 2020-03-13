<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\College;
use App\QuestionsGeneral;
use App\AnswersGeneral;
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

  public function sort(){

    $colleges = College::all();

    $orderByArray = explode(' ', request('orderBy'));

    $column = $orderByArray[0];
    $direction = $orderByArray[1];


    $questionsGenerals = QuestionsGeneral::orderBy($column, $direction)->get();

    return view('user.home')->with([
      'colleges' => $colleges,
      'questionsGenerals' => $questionsGenerals
    ]);

  }
}

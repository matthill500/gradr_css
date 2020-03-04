<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Module;
use App\QuestionsModule;
class BaseController extends Controller
{
  public function index($id)
  {
      $bid = (int)($id);
      $courses = Course::all();
      $modules = Module::all();
      $questionsModules = QuestionsModule::all();

      return view('user.base')->with([
        'courses' => $courses,
        'modules' => $modules,
        'bid' => $bid,
        'questionsModules' => $questionsModules
      ]);
  }

  public function sort($id){

    $bid = (int)($id);

    $modules = Module::all();
    $courses = Course::all();

    $orderByArray = explode(' ', request('orderBy'));

    $column = $orderByArray[0];
    $direction = $orderByArray[1];


    $questionsModules = QuestionsModule::orderBy($column, $direction)->get();

    return view('user.base')->with([
      'modules' => $modules,
      'courses' => $courses,
      'bid' => $bid,
      'questionsModules' => $questionsModules
    ]);

  }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Module;
use App\QuestionsCourse;
class ModulesController extends Controller
{
  public function index($id)
  {
      $mid = (int)($id);
      $courses = Course::all();
      $modules = Module::all();
      $questionsCourses = QuestionsCourse::all();

      return view('user.modules')->with([
        'courses' => $courses,
        'modules' => $modules,
        'mid' => $mid,
        'questionsCourses' => $questionsCourses
      ]);
  }

  public function sort($id){

    $mid = (int)($id);
    $modules = Module::all();
    $courses = Course::all();

    $orderByArray = explode(' ', request('orderBy'));

    $column = $orderByArray[0];
    $direction = $orderByArray[1];


    $questionsCourses = QuestionsCourse::orderBy($column, $direction)->get();

    return view('user.modules')->with([
      'modules' => $modules,
      'courses' => $courses,
      'mid' => $mid,
      'questionsCourses' => $questionsCourses
    ]);

  }
}

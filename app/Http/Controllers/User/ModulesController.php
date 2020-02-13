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
}

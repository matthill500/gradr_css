<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Course;
use App\College;
use App\QuestionsCollege;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
  public function index($id)
  {
      $cid = (int)($id);
      $colleges = College::all();
      $courses = Course::all();
      $questionsColleges = QuestionsCollege::all();

      return view('user.courses')->with([
        'courses' => $courses,
        'colleges' => $colleges,
        'cid' => $cid,
        'questionsColleges' => $questionsColleges
      ]);
  }

    public function sort($id){

      $cid = (int)($id);
      $colleges = College::all();
      $courses = Course::all();

      $orderByArray = explode(' ', request('orderBy'));

      $column = $orderByArray[0];
      $direction = $orderByArray[1];


      $questionsColleges = QuestionsCollege::orderBy($column, $direction)->get();

      return view('user.courses')->with([
        'colleges' => $colleges,
        'courses' => $courses,
        'cid' => $cid,
        'questionsColleges' => $questionsColleges
      ]);

    }
}

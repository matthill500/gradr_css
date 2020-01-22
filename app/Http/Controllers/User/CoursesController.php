<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Course;
use App\College;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
  public function index($id)
  {
      $cid = (int)($id);
      $colleges = College::all();
      $courses = Course::all();

      return view('user.courses')->with([
        'courses' => $courses,
        'colleges' => $colleges,
        'cid' => $cid
      ]);
  }
}

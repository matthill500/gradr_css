<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\QuestionsCollege;


class ProfileController extends Controller
{
  public function index()
  {
    $questionsColleges = QuestionsCollege::all();

    return view('user.profile')->with([
      'questionsColleges' => $questionsColleges

    ]);
  }
}

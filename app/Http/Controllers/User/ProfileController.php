<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\QuestionsCollege;
use App\QuestionsCourse;
use App\QuestionsModule;
use App\QuestionsGeneral;
use App\User;
use Auth;
use Hash;
use Storage;
use DB;


class ProfileController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    $questionsColleges = QuestionsCollege::all();
    $questionsCourses = QuestionsCourse::all();
    $questionsModules = QuestionsModule::all();
    $questionsGenerals = QuestionsGeneral::all();

   $questionsGeneralsVotes = DB::table('questions_generals')->where('student_id', $user->student->id)->value('votes');
   $questionsCoursesVotes = DB::table('questions_courses')->where('student_id', $user->student->id)->value('votes');
   $questionsModulesVotes = DB::table('questions_modules')->where('student_id', $user->student->id)->value('votes');
   $questionsCollegesVotes = DB::table('questions_colleges')->where('student_id', $user->student->id)->value('votes');

   $answersGeneralsVotes = DB::table('answers_generals')->where('student_id', $user->student->id)->value('votes');
   $answersCoursesVotes = DB::table('answers_courses')->where('student_id', $user->student->id)->value('votes');
   $answersModulesVotes = DB::table('answers_modules')->where('student_id', $user->student->id)->value('votes');
   $answersCollegesVotes = DB::table('answers_colleges')->where('student_id', $user->student->id)->value('votes');

   $rating = $questionsGeneralsVotes + $questionsCoursesVotes + $questionsModulesVotes + $questionsCollegesVotes +
             $answersGeneralsVotes + $answersCoursesVotes + $answersModulesVotes + $answersCollegesVotes;

    return view('user.myProfile')->with([
      'user' => $user,
      'questionsColleges' => $questionsColleges,
      'questionsCourses' => $questionsCourses,
      'questionsModules' => $questionsModules,
      'questionsGenerals' => $questionsGenerals,
      'rating' => $rating
    ]);

  }

  public function viewUserProfile($name)
  {
    $questionsColleges = QuestionsCollege::all();
    $questionsCourses = QuestionsCourse::all();
    $questionsModules = QuestionsModule::all();
    $questionsGenerals = QuestionsGeneral::all();

    $user = User::where('name',$name)->first();

    $questionsGeneralsVotes = DB::table('questions_generals')->where('student_id', $user->student->id)->value('votes');
    $questionsCoursesVotes = DB::table('questions_courses')->where('student_id', $user->student->id)->value('votes');
    $questionsModulesVotes = DB::table('questions_modules')->where('student_id', $user->student->id)->value('votes');
    $questionsCollegesVotes = DB::table('questions_colleges')->where('student_id', $user->student->id)->value('votes');

    $answersGeneralsVotes = DB::table('answers_generals')->where('student_id', $user->student->id)->value('votes');
    $answersCoursesVotes = DB::table('answers_courses')->where('student_id', $user->student->id)->value('votes');
    $answersModulesVotes = DB::table('answers_modules')->where('student_id', $user->student->id)->value('votes');
    $answersCollegesVotes = DB::table('answers_colleges')->where('student_id', $user->student->id)->value('votes');

    $rating = $questionsGeneralsVotes + $questionsCoursesVotes + $questionsModulesVotes + $questionsCollegesVotes +
              $answersGeneralsVotes + $answersCoursesVotes + $answersModulesVotes + $answersCollegesVotes;

    return view('user.profile')->with([
      'questionsColleges' => $questionsColleges,
      'questionsCourses' => $questionsCourses,
      'questionsModules' => $questionsModules,
      'questionsGenerals' => $questionsGenerals,
      'name' => $name,
      'user' => $user,
      'rating' => $rating
    ]);
  }
  public function edit()
  {
    // $id = Auth::user()->id;
    // $user = User::findOrFail($id);

    $user = Auth::user();

    return view('user.editProfile')->with([
      'user' => $user
    ]);
  }
  public function update(Request $request)
  {
    $id = Auth::user()->id;
    $user = User::findOrFail($id);

    $user->bio =  $request->input('bio');
    //img
    if($request->hasFile('image')){
    $image = $request->image;
    $ext = $image->getClientOriginalExtension();
    $filename = uniqid().'.'.$ext;
    $image->storeAs('public/img',$filename);
    Storage::delete("public/img/{$user->image}");
    $user->image = $filename;
    }
    $user->save();

    return redirect()->route('user.myProfile');

  }
}

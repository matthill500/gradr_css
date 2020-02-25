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


class ProfileController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $questionsColleges = QuestionsCollege::all()->take(2);
    $questionsCourses = QuestionsCourse::all()->take(2);
    $questionsModules = QuestionsModule::all()->take(2);
    $questionsGenerals = QuestionsGeneral::all()->take(2);

    return view('user.myProfile')->with([
      'user' => $user,
      'questionsColleges' => $questionsColleges,
      'questionsCourses' => $questionsCourses,
      'questionsModules' => $questionsModules,
      'questionsGenerals' => $questionsGenerals

    ]);
  }

  public function viewUserProfile($name)
  {
    $questionsColleges = QuestionsCollege::all()->take(2);
    $questionsCourses = QuestionsCourse::all()->take(2);
    $questionsModules = QuestionsModule::all()->take(2);
    $questionsGenerals = QuestionsGeneral::all()->take(2);

    $user = User::where('name',$name)->first();

    return view('user.profile')->with([
      'questionsColleges' => $questionsColleges,
      'questionsCourses' => $questionsCourses,
      'questionsModules' => $questionsModules,
      'questionsGenerals' => $questionsGenerals,
      'name' => $name,
      'user' => $user
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

    $request->validate([
      'name' => 'required|max:191'
    ]);

    $user->name = $request->input('name');
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

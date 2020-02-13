<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\QuestionsCollege;
use App\User;
use Auth;
use Hash;
use Storage;


class ProfileController extends Controller
{
  public function index($name)
  {
    $questionsColleges = QuestionsCollege::all();

    $name = urldecode($name);

    return view('user.profile')->with([
      'questionsColleges' => $questionsColleges,
      'name' => $name
    ]);
  }
  public function edit()
  {
    $id = Auth::user()->id;
    $user = User::findOrFail($id);

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

    return redirect()->route('user.home');

  }
}

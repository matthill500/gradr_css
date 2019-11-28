<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Student;
use App\Role;

class StudentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

      $students = DB::table('students')
      ->leftJoin('users','users.id', '=', 'students.user_id')
      ->get();

      return view('admin.students.index')->with([
       'students' => $students
      ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.students.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
      'name' => 'required|',
      'email'  => 'required|email|unique:users,email',
      'password'  => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
      'phone'  => 'required|max:14',
      'address'  => 'required|max:30',
      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));

      $user->save();

      $student = new student();

      $student->phone = $request->input('phone');
      $student->address = $request->input('address');
      $student->user_id = $user->id;

      $student->save();

      $user->roles()->attach(Role::where('name','user')->first());



      return redirect()->route('admin.students.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $students = DB::table('students')
    ->leftJoin('users','users.id', '=', 'students.user_id')
    ->where('user_id', '=', $id)
    ->first();


      return view('admin.students.show')->with([
        'students' => $students
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $students = DB::table('students')
    ->leftJoin('users','users.id', '=', 'students.user_id')
    ->where('user_id', '=', $id)
    ->first();


      return view('admin.students.edit')->with([
        'students' => $students
      ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    $request->validate([
    'name' => 'required|',
    'email'  => 'required|email',
    'phone'  => 'required|max:14',
    'address'  => 'required|max:30',

    ]);


    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->student->phone = $request->input('phone');
    $user->student->address = $request->input('address');

    $user->save();
    $user->student->save();




    return redirect()->route('admin.students.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $user = User::findOrFail($id);

    $user->roles()->detach();

    $user->delete();

  return redirect()->route('admin.students.index');

  }
}

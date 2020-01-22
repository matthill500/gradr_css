<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\College;
use App\Category;
class CourseController extends Controller
{
  public function index()
  {
      $courses = Course::all();

      return view('admin.courses.index')->with([
        'courses' => $courses
      ]);
  }

  public function create()
  {
    $colleges = College::all();

      return view('admin.courses.create')->with([
        'colleges' => $colleges
      ]);
  }

  public function store(Request $request)
  {
      $request->validate([
      'course_name' => 'required|',
      'course_code'  => 'required|',
      'cao_points'  => 'required|',
      'college_id' => 'required|'
      ]);


      $course = new Course();
      $course->course_name = $request->input('course_name');
      $course->course_code = $request->input('course_code');
      $course->cao_points = $request->input('cao_points');
      $course->college_id = $request->input('college_id');

      $course->save();

      return redirect()->route('admin.courses.index');
  }

  public function show($id)
  {
      $course = Course::findOrFail($id);

      return view('admin.courses.show')->with([
        'course' => $course
      ]);
  }

  public function edit($id)
  {
    $colleges = College::all();
    $course = Course::findOrFail($id);

    return view('admin.courses.edit')->with([
      'course' => $course,
      'colleges' => $colleges
    ]);
  }

  public function update(Request $request, $id)
  {
    $course = Course::findOrFail($id);

    $request->validate([
      'course_name' => 'required|',
      'course_code'  => 'required|',
      'cao_points'  => 'required|',
      'college_id' => 'required|'
    ]);

    $course->course_name = $request->input('course_name');
    $course->course_code = $request->input('course_code');
    $course->cao_points = $request->input('cao_points');
    $course->college_id = $request->input('college_id');

    $course->save();

    return redirect()->route('admin.courses.index');
  }

  public function destroy($id)
  {
    $course = Course::findOrFail($id);

    $course->delete();

    return redirect()->route('admin.courses.index');
  }
}

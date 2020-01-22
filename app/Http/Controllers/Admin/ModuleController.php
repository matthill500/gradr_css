<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\College;
use App\Category;
use App\Module;
class ModuleController extends Controller
{
  public function index()
  {
      $modules = Module::all();

      return view('admin.modules.index')->with([
        'modules' => $modules
      ]);
  }

  public function create()
  {
    $courses = Course::all();

      return view('admin.modules.create')->with([
        'courses' => $courses
      ]);
  }

  public function store(Request $request)
  {
      $request->validate([
      'module_name' => 'required|',
      'course_id' => 'required|'
    ]);


      $module = new Module();
      $module->module_name = $request->input('module_name');
      $module->course_id = $request->input('course_id');

      $module->save();

      return redirect()->route('admin.modules.index');
  }

  public function show($id)
  {
      $module = Module::findOrFail($id);

      return view('admin.modules.show')->with([
        'module' => $module
      ]);
  }

  public function edit($id)
  {
    $courses = Course::all();
    $module = Module::findOrFail($id);

    return view('admin.modules.edit')->with([
      'module' => $module,
      'courses' => $courses
    ]);
  }

  public function update(Request $request, $id)
  {
    $module = Module::findOrFail($id);

    $request->validate([
      'module_name' => 'required|',
      'course_id' => 'required|'
    ]);

    $module->module_name = $request->input('module_name');
    $module->college_id = $request->input('course_id');

    $module->save();

    return redirect()->route('admin.modules.index');
  }

  public function destroy($id)
  {
    $module = Module::findOrFail($id);

    $module->delete();

    return redirect()->route('admin.modules.index');
  }
}

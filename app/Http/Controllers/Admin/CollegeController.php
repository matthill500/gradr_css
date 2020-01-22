<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\College;
use App\Course;
use App\Module;
use App\Category;
use Auth;
use Hash;
use Storage;
class CollegeController extends Controller
{
  public function index()
  {
      $colleges = College::all();

      return view('admin.colleges.index')->with([
        'colleges' => $colleges
      ]);
  }

  public function create()
  {
      return view('admin.colleges.create');
  }

  public function store(Request $request)
  {
      $request->validate([
      'name' => 'required|',
      'info' => 'required|',
      'image' => 'nullable|image|max:1999',
      'address'  => 'required|'
      ]);

      $college = new College();
      $college->name = $request->input('name');
      $college->info = $request->input('info');
      $college->address = $request->input('address');
      //img
      if($request->hasFile('image')){
      $image = $request->image;
      $ext = $image->getClientOriginalExtension();
      $filename = uniqid().'.'.$ext;
      $image->storeAs('public/img',$filename);
      Storage::delete("public/img/{$college->image}");
      $college->image = $filename;
      }
      $college->save();

      return redirect()->route('admin.colleges.index');
  }

  public function show($id)
  {
      $college = College::findOrFail($id);

      return view('admin.colleges.show')->with([
        'college' => $college
      ]);
  }

  public function edit($id)
  {
    $college = College::findOrFail($id);

    return view('admin.colleges.edit')->with([
      'college' => $college
    ]);
  }

  public function update(Request $request, $id)
  {
    $college = College::findOrFail($id);

    $request->validate([
      'name' => 'required|',
      'info' => 'required|',
      'image' => 'nullable|image|max:1999',
      'address' => 'required|',
    ]);

    $college->name = $request->input('name');
    $college->info = $request->input('info');
    $college->address = $request->input('address');
    //img
    if($request->hasFile('image')){
    $image = $request->image;
    $ext = $image->getClientOriginalExtension();
    $filename = uniqid().'.'.$ext;
    $image->storeAs('public/img',$filename);
    Storage::delete("public/img/{$college->image}");
    $college->image = $filename;
    }

    $college->save();

    return redirect()->route('admin.colleges.index');
  }

  public function destroy($id)
  {
    $college = College::findOrFail($id);

    $college->delete();

    return redirect()->route('admin.colleges.index');
  }
}

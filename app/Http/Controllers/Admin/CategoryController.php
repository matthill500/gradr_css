<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
  public function index()
  {
      $categories = Category::all();

      return view('admin.categories.index')->with([
        'categories' => $categories
      ]);
  }

  public function create()
  {
    return view('admin.categories.create');
  }

  public function store(Request $request)
  {
      $request->validate([
      'category_name' => 'required|'
      ]);

      $category = new Category();
      $category->category_name = $request->input('category_name');

      $category->save();

      return redirect()->route('admin.categories.index');
  }

  public function show($id)
  {
      $category = Category::findOrFail($id);

      return view('admin.categories.show')->with([
        'category' => $category
      ]);
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);

    return view('admin.categories.edit')->with([
      'category' => $category
    ]);
  }

  public function update(Request $request, $id)
  {
    $category = Category::findOrFail($id);

    $request->validate([
      'category_name' => 'required|'
    ]);

    $category->category_name = $request->input('category_name');

    $category->save();

    return redirect()->route('admin.categories.index');
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);

    $category->delete();

    return redirect()->route('admin.categories.index');
  }
}

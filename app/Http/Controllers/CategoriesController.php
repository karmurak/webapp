<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  //
  public function index()
  {
    $categories = Category::all();
    return view('admin/categories', ['categories' => $categories]);
  }

  public function store(Request $req)
  {
    $req->validate([
      'name' => 'required'
    ]);
    $category = new Category();
    $category->category_name = $req->name;
    $category->save();
    return back()
      ->with('success', 'Saved Successfully');
  }

  public function update(Request $req, $id)
  {
    $req->validate(['name' => 'required']);
    $categoryModel = Category::find($id);
    $categoryModel->category_name = $req->name;
    $categoryModel->update();
    return back()->with('success', 'Category has been updated.');
  }

  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();
    return back()->with('success', 'Category Deleted');
  }
}

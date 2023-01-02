<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageMultiUploadController extends Controller
{
  //
  public function index(){
    return view('admin/uploadmulti');
  }

  public function store(Request $req){
    //dd("store hit", $req->hasFile('images'));
    $req->validate([
      'images' => 'required',
      'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
    ]);
    if($req->hasFile('images')){
      //dd($req->file('images'));
      $images = $req->file('images');
      foreach($images as $img){

      }
    }
  }
}

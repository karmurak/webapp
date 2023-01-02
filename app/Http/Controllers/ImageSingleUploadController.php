<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageSingleUploadController extends Controller
{
  //
  public function index()
  {
    $sliderImages = Image::all();
    return view('admin/uploadImg', ['sliderImages' => $sliderImages]);
  }

  public function store(Request $req)
  {
    $req->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $fileModel = new Image();
    if ($req->file()) {
      $fileName = time() . '_' . $req->image->getClientOriginalName();
      $filePath = $req->image->storeAs('uploads', $fileName);
      $sliderType = $req->sliderType;
      $fileModel->name = time() . '_' . $req->image->getClientOriginalName();
      $fileModel->file_path = '/storage/' . $filePath;
      $fileModel->type = $sliderType;
      $fileModel->save();
      return back()
        ->with('success', 'File has been uploaded.')
        ->with('image', $fileName);
    }
  }

  public function editImg(Request $req)
  {
    $img = Image::find($req->id);
    return view('admin/editImg', ['id' => $req->id, 'img' => $img]);
  }

  public function updateImg(Request $req, $id)
  {
    $req->validate(['sliderType' => 'required']);
    $fileModel = Image::find($id);
    // dd($req->sliderType, $req->image);
    if ($req->file()) {
      $fileName = time() . '_' . $req->image->getClientOriginalName();
      $filePath = $req->image->storeAs('uploads', $fileName);
      $type = $req->sliderType;
      $fileModel->name = time() . '_' . $req->image->getClientOriginalName();
      $fileModel->file_path = '/storage/' . $filePath;
      $fileModel->type = $type;
      $fileModel->update();
      return back()
        ->with('success', 'File has been updated.')
        ->with('image', $fileName);
    } else {
      if ($req->sliderType !== 'Choose the slider') {
        $type = $req->sliderType;
        $fileModel->type = $type;
        $fileModel->update();
        return back()
          ->with('success', 'File type has been updated.');
      }else{
        return back()
        ->with('success', 'Please Choose file gype.');
      }
    }
  }

  public function deleteImg($id, $name)
  {
    $dbImg = Image::find($id);
    $dbImg->delete();
    $img = 'app/uploads/' . $name;
    if (file_exists(storage_path($img))) {
      File::delete(storage_path($img));
    }
    return redirect()->route('upload-img')->with('success', 'Image Deleted');
  }

  function displayImage($queryString)
  {
    $img = 'app/uploads/' . $queryString;
    if (file_exists(storage_path($img))) {
      $file = File::get(storage_path($img));
      $extension = (File::extension(storage_path($img)));
      $res = Response::make($file, 200);
      $res->header("Content-Type", "image/$extension");
      return $res;
    }
  }
}

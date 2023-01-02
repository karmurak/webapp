<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopSecMenController extends Controller
{
  //
  public function featureHome()
  {
    return view('user/features');
  }
}

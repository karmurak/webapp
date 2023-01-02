<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
  //role based route control
  public function index(){
    // dd(">>", auth()->user()->role);//this cant hit if give home route with Controller in web.php line 26
    if(auth()->user()->role == 'admin'){
      return redirect()->route('home');
    }else{
      return redirect()->route('/');
    }
  }
}

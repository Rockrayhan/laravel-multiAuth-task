<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        $pending =  $user->status == 0 ;
        $approval =  $user->status == 1 ;
        return view('dashboard' , compact('pending', 'approval'));
      }



    //   public function dashboard()
    //   {
    //       $user = Auth::user(); // Get the currently authenticated user
    
    //       // Check if the user is logged in and their status
    //       if ($user && $user->status == 0) {
    //           return view('pending');
    //       } else {
    //           return view('dashboard');
    //       }
    //   }
}

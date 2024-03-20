<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function dashboard()
  {
    $users = User::where('role', 'user')->get();
    return view('admin.dashboard', compact('users'));
  }


// approve user 
  public function status(Request $request, $id)
  {
    $user = User::find($id);
    $user->status = $request->status;
    $user->save();
    return back()->with('msg', 'Status Updated');
  }





  // delete user
  public function delete(string $id)
  {
    $user = User::find($id);
    $user->delete();
    return back()->with('msg_delete', ' User Has Been Deleted ');
  }
}

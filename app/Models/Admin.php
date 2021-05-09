<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
  use HasFactory;
  public function user($request)
  {
// return Hash::make('admin');
    $msg = array();
    $email = $request->post('email');
    $password = $request->post('password');
    $result = DB::table('admins')->where(['email' => $email])->get();
    if (isset($result[0]))
     {
        if (Hash::check($password, $result[0]->password)) {
          $request->session()->put('ADMIN_LOGIN', true);
          $request->session()->put('ADMIN_ID', $result[0]->id);

          return redirect('admin/dashboard');
          // return response()->json($msg);

        }
       else {
        $request->session()->flash('error', 'invalid password');
        return redirect('admin');
      }
    } else {
      $request->session()->flash('error', 'please enter valid details');
      return redirect('admin');
    }
  }
}

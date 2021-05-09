<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        $data['product_data'] = Product::all();
        return view('front.index', $data);
    }
    public function register(Request $request)
    {

        return view('front.register');
    }
    public function userRegistration(Request $request)
    {

        $name = trim($request->post('name'));
        $email = trim($request->post('email'));
        $password = trim($request->post('password'));
        $cnfPassword = trim($request->post('cnfpassword'));
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:customers',
            ]
        );
        //     echo '<pre>';
        // print_r($request);
        // if ($name == "") {
        //     $msg = "name cannnot be null";
        // } else {
        //     $data['name'] = $name;
        // }

        if (strlen($password) > 5) {
            if ($password == $cnfPassword) {
                $data['password'] = Hash::make($password);
            } else {
                $msg = "password not match";
            }
        } else {
            $msg = "password should be 5 char";
        }

        $data['name'] = $name;
        $data['email'] = $email;
        $data['status'] = 1;

        if (!empty($msg)) {
            echo $msg;
        } else {
            $model = DB::table('customers');
            $model->insert($data);
            $msg = "registration successfully";
        }



        $request->session()->flash('message', $msg);
        return redirect('home/register');
    }
    public function userAuth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = DB::table('customers')->where(['email' => $email])->get();
        if (isset($result[0])) {
            if (Hash::check($password, $result[0]->password)) {
                $request->session()->put('USER_LOGIN', true);
                $request->session()->put('USER_ID', $result[0]->id);
                $request->session()->put('USER_NAME', $result[0]->name);
                $request->session()->put('USER_STATUS', $result[0]->status);//reflect all
                $request->session()->flash('user_name', $result[0]->name);//reflect on current page
                // return session()->get('USER_NAME');
                return redirect('/');
                // return response()->json($msg);

            } else {
                $request->session()->flash('error', 'invalid password');
                return redirect('/');
            }
        } else {
            $request->session()->flash('error', 'please enter valid details');
            return redirect('/');
        }
    }
}

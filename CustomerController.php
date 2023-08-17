<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $cat = Category::get();
        $pro = Product::get();
        return view('customer.index', compact('cat', 'pro'));
    }


//login
    public function login()
    {
        return view('customer.login');
    }

    public function loginProcess(Request $request)
    {
        $user = User::where('userName', '=', $request->user_name)->first();
        if($user){
            if($user->userPassword == md5($request->user_password)){
                $request->session()->put('userName', $user->userName);
                 $request->session()->put('userAddress', $user->userAddress);
                 $request->session()->put('userPhone', $user->userPhone);
                $request->session()->put('userProfile', $user->userProfile);
                return redirect('customer/index');
            } else {
                return back()->with('fail', 'Password does not match!');
            }
        } else {
            return back()->with('fail', 'Username is not existed');
        }
    }

    public function logout()
    {
       
        Session::pull('userName');
        Session ::pull('userAddress');
        Session::pull('userPhone');
        Session::pull('userProfile');
        return redirect('customer/index');
    }

//register
    public function register()
    {
        return view('customer.register');
    }

    public function registerProcess(Request $request){
        $u = new User();
        $u->userName = $request->user_name;
        $u->userAddress = $request->user_address;
        $u->userPhone = $request->user_phone;
        $u->userPassword = md5($request->user_password);
        $u->userProfile = $request->user_image;
        $u->save();
        return redirect('customer/login')->with('success', 'Register successfully! Let login');
    }

    public function collections($id)
    {
        $category = Category::get();
        $cat = Category::where('catID', $id) -> first();
        $pro = Product::where('catID', $id)->get();
        return view('customer.collections', compact('cat', 'pro', 'category'));
    }


}


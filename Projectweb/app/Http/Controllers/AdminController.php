<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginProcess(Request $request)
    {
        $admin = Admin::where('adminID', '=', $request->username)->first();
        if($admin){
            if($admin->adminPass == $request->password){
                $request->session()->put('adminID', $admin->$adminID);
                $request->session()->put('adminName', $admin->$adminFullname);
                $request->session()->put('adminID', $admin->$adminID);
                $request->session()->put('adminPhoto', $admin->$adminPhoto);
                return redirect('admin/index');
            } else {
                return back()->with('fail', 'Password does not match!');
            }
        } else {
            return back()->with('fail', 'Username is not existed');
        }
    }

    public function logout()
    {
        Session::pull('adminID');
        Session::pull('adminName');
        Session::pull('adminPhoto');
        return redirect('admin/login');
    }

    public function list()
    {
        $pro = Product::get();
        return view('admin.product-list', compact('pro'));
    }

    public function add()
    {
        $cat = Category::get();
        return view('admin.product-add', compact('cat'));
    }

    public function save(Request $request)
    {
        $p = new Product();
        $p->productID = $request->id;
        $p->productName = $request->name;
        $p->productPrice = $request->price;
        $p->productDetails = $request->details;
        $p->productImage = $request->image;
        $p->catID = $request->category;
        $p->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}

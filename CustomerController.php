<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $cat = Category::get();
        $pro = Product::get();
        return view('customer.index', compact('cat', 'pro'));
    }

    public function login()
    {
        $cat = Category::get();
        return view('customer.login', compact('cat'));
    }

   
}


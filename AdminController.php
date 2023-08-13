<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function listProduct()
    {
        $pro = Product::get();
        return view('admin.product-list', compact('pro'));
    }

    public function addProduct()
    {
        $cat = Category::get();
        return view('admin.product-add', compact('cat'));
    }

    public function saveProduct(Request $request)
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

    public function deleteProduct($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function editProduct($id)
    {
        $cat = Category::get();
        $pro = Product::where('productID', '=', $id)->first();
        return view('admin.product-edit', compact('pro', 'cat'));
    }

    public function updateProduct(Request $request)
    {
        $image = $request->new_image == "" ? $request->old_image : $request->new_image;
        Product::where('productID', '=', $request->id)->update([
            'productName'=> $request->name,
            'productPrice'=> $request->price,
            'productDetails'=> $request->details,
            'productImage'=> $image,
            'catID'=> $request->category
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    

//category
    public function listCategory()
    {
        $cat = Category::get();
        return view('admin.category-list', compact('cat'));
    }
    public function addCategory()
    {
        return view('admin.category_add');
    }
    public function saveCategory(Request $request)
    {   
        $c = new Category();
        $c->catID = $request->id;
        $c->catName = $request->name;
        $c->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function editCategory($id)
    {
        $cat = Category::where('catID', '=', $id)->first();
        return view('admin.category_edit', compact('cat'));
    }
    public function categoryUpdate(Request $request)
    {
        Category::where('catID', '=', $request->id)->update([
            'catName'=> $request->name,
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    public function categoryDelete($id)
    {
        Category::where('catID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }



 //admin login
    public function login()
    {
        return view('admin.login');
    }
    public function loginProcess(Request $request)
    {
        $admin = Admin::where('adminEmail', '=', $request->email)->first();
        if($admin){
            if($admin->adminPassword == md5($request->password)){
                $request->session()->put('adminEmail', $admin->adminEmail);
                 $request->session()->put('adminName', $admin->adminName);
                $request->session()->put('adminProfile', $admin->adminProfile);
                $request->session()->put('adminStatus', $admin->adminStatus);
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
       
        Session::pull('adminEmail');
        Session ::pull('adminName');
        Session::pull('adminProfile');
        return redirect('admin/login');
    }



    //User
    public function userList(){
        $u = User::get();
        return view('admin.user_list', compact('u'));
    }

    public function userEdit($id)
    {
        $u = User::where('userID', '=', $id)->first();
        return view('admin.user_edit', compact('u'));
    }

    public function userUpdate(Request $request)
    {
        $img = $request->new_image == "" ? $request->old_image : $request->new_image;
        User::where('userID', '=', $request->id)->update([
            'userName'=> $request->name,
            'userPhone'=> $request->phone,
            'userAddress'=> $request->address,
            'userProfile'=> $img,
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function userDelete($id)
    {
        User::where('userID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }


    //admin data
    public function adminAdd()
    {
        return view('admin.admin_add');
    }
    public function adminSave(Request $request)
    {    
        $a = new Admin();
        $a->adminEmail = $request->admin_email;
        $a->adminName = $request->admin_name;
        $a->adminProfile = $request->admin_image;
        if (isset($request->admin_status)) {
            $a->adminStatus = 1;
        } else {
            $a->adminStatus = 0; // or any other default value if the checkbox is not checked
        }
        $a->adminPassword = md5($request->admin_password);
        $a->save();
        return redirect()->back()->with('success', 'Admin added successfully!');
    }
    public function adminList()
    {
        $a = Admin::get();
        return view('admin.admin_list', compact('a'));
    }
    public function adminEdit($id)
    {
        $a = Admin::where('adminID', '=', $id)->first();
        return view('admin.admin_edit', compact('a'));
    }
    public function adminUpdate(Request $request)
    {
        $img = $request->new_image == "" ? $request->old_image : $request->new_image;
        Admin::where('adminID', '=', $request->id)->update([
            'adminName'=> $request->name,
            'adminEmail'=> $request->email,
            'adminStatus'=> $request->has('status') ? 1 : 0,
            'adminPassword'=> $request->password,
            'adminProfile'=> $img,
        ]);
        return redirect()->back()->with('success', 'Admin updated successfully!');
    }
    public function adminDelete($id)
    {
        Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully!');
    }
}

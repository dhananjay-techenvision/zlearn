<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Categories;

use DB;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_list(Request $request)
    {
        // if(view()->exists($request->path())){
        //     return view($request->path());
        // }
       $data =  User::get();
        // dd($data);
        return view('Admin.admin_list');
    }

    public function user_list(Request $request)
    {
        
        return view('Admin.user_list');
    }

    public function categories_list()
    {

       $data['Categories'] =  Categories::get();
        // dd($data);
        return view('Admin.categories_list',$data);
    }
    
}

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
       $data =  User::get();
        $data['flag'] = 1; 
        $data['page_title'] = 'View Admin'; 
        return view('Admin/webviews/manage_admin_user',$data);
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

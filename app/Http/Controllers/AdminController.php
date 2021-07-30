<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Categories;
use App\Standerd;
Use App\Subject;
Use App\chapter;


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
     
    public function add_subject()
    {
       // dd("hello");
       $data =  User::get();
        $data['flag'] = 2; 
        $data['page_title'] = 'Add SUbject';
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get();
        //dd($data['standerds']);  
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_standard()
    {
        $data =  User::get();
        $data['flag'] = 3; 
        $data['page_title'] = 'Add Standard';        
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_chapter()
    {
        $data =  User::get();
        $data['flag'] = 4; 
        $data['page_title'] = 'Add Chapter'; 
        $data['subjects'] = DB::table('subjects')->where('status',"1")->get(); 
        return view('Admin/webviews/manage_admin_user',$data);
    }

    
    public function submit_standard(Request $req)
    {
       // dd($req);
        $this->validate($req,[
            'standerd_name'=>'required',        
            'status'=>'nullable|numeric'             
         ]);

         $result = DB::table('standerds')->where('standerd_name', $req->class_name)->first(); 

         if(!$result)
        {   
        // ======================================
    
       
     
        $data = new Standerd;
            $data->standerd_name=$req->standerd_name;            
            $data->status=$req->status;             
        $result = $data->save();
        if($result)
        {
            $req->session()->flash('alert-success', 'Standard was Successfully Added!');
        }
        else
        {
            $req->session()->flash('alert-danger', 'Standard Not Added!!!');
        } 
    }
    else
    {
        $req->session()->flash('alert-danger', 'Standard Already Exists!!!');
    }         

     return back(); 
    }

    public function submit_subject(Request $req)
    {
       // dd($req);

        $this->validate($req,[
            'sub_name'=>'required',
            'semester'=>'required|numeric',         
            'status'=>'nullable|numeric'             
         ]);

         $result = DB::table('subjects')->where('subject_name', $req->sub_name)->first(); 
         if(!$result)
         {  
            $data = new Subject;
                $data->subject_name=$req->sub_name; 
                $data->semister_id=$req->semester;           
                $data->status=$req->status;             
            $result = $data->save();
            if($result)
            {
                $req->session()->flash('alert-success', 'Subject was Successfully Added!');
            }
            else
            {
                $req->session()->flash('alert-danger', 'Subject Not Added!!!');
            } 
        }
        else
        {
            $req->session()->flash('alert-danger', 'Subject Already Exists!!!');
        }         
    
        return back(); 

    }

    public function submit_chapter(Request $req)
    {
       // dd($req);
        
        $this->validate($req,[
            'subject_id'=>'required|numeric',
            'chapter_name'=>'required',
            'semester'=>'required|numeric',        
            'status'=>'nullable|numeric'             
         ]);

         $result = DB::table('chapters')->where('Chapter_name', $req->chapter_name)->first(); 

         if(!$result)
         {  
            $data = new chapter;
                $data->chapter_name=$req->chapter_name; 
                $data->subject_id=$req->subject_id;
                $data->semister_id=$req->semester;          
                $data->status=$req->status;             
            $result = $data->save();
            if($result)
            {
                $req->session()->flash('alert-success', 'Chapter was Successfully Added!');
            }
            else
            {
                $req->session()->flash('alert-danger', 'Chapter Not Added!!!');
            } 
        }
        else
        {
            $req->session()->flash('alert-danger', 'Chapter Already Exists!!!');
        }         
    
        return back(); 

         
    }

    public function view_standard()
    {
       // dd("String");

        $data =  User::get();
        $data['flag'] = 5; 
        $data['page_title'] = 'All Standard';  
        $data['standerds'] = DB::table('standerds')->get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function view_subject()
    {
        ///dd("String");
        $data =  User::get();
        $data['flag'] = 6; 
        $data['page_title'] = 'All Subject';  
        $data['subjects'] = DB::table('subjects')->get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }
    public function view_chapter()
    {
       // dd("String");
       $data =  User::get();
       $data['flag'] = 7; 
       $data['page_title'] = 'All Chapter';  
       $data['chapters'] = DB::table('chapters')->get();     
       return view('Admin/webviews/manage_admin_user',$data);
    }
    
}

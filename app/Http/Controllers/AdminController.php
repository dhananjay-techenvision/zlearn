<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Categories;
use App\Standerd;
Use App\Subject;
Use App\chapter;
Use App\College;
Use App\Semister;



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
     

    public function view_subject()
    {
       
        $data['flag'] = 6; 
        $data['page_title'] = 'All Subject';  
        $data['subjects'] = Subject::get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function add_subject()
    {
        $data['flag'] = 2; 
        $data['page_title'] = 'Add Subject';
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get();
        $data['semister'] = Semister::where('status',"1")->get();
        //dd($data['standerds']);  
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function submit_subject(Request $req)
    {
    //    dd($req);

        $this->validate($req,[
            'sub_name'=>'required',
            'semister_id'=>'required|numeric',  
            'standard_id'=>'required|numeric',         
            'status'=>'nullable|numeric'             
         ]);


         if($req->id) { 

            Standerd::where('id',$req->id)->update([
                'subject_name' => $req->subject_name,
                'semister_id' => $req->semister_id,
                'standard_id' => $req->standard_id,
                'status' => $req->status,
            ]);
            toastr()->success('Standard Updated Successfully!');
            return back(); 

         }else{
 
                $data = new Subject;
                $data->subject_name=$req->sub_name; 
                $data->semister_id=$req->semister_id;   
                $data->standard_id=$req->standard_id;           
                $data->status=$req->status;             
                $result = $data->save();
            if($result)
            {
                toastr()->success('Subject Successfully Added!');
            }
            else
            {
                toastr()->error('Subject Not Added!!');
            }         
    
        // toastr()->success('Subject Successfully Added!');
        return redirect('view-subject');

        }
    }



    public function view_standard()
    {
       
        $data['flag'] = 5; 
        $data['page_title'] = 'All Standard';  
        $data['standerds'] = Standerd::get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_standard()
    {
        $data['flag'] = 3; 
        $data['page_title'] = 'Add Standard';        
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function submit_standard(Request $req)
    {
    //    dd($req);
        $this->validate($req,[
            'standerd_name'=>'required',        
            'status'=>'nullable|numeric'             
         ]);


         if($req->id) { 

            Standerd::where('id',$req->id)->update([
                'standerd_name' => $req->standerd_name,
                'status' => $req->status,
            ]);
            toastr()->success('Standard Updated Successfully!');
            return back(); 

         }else{

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
                    toastr()->success('Standard Successfully Added!');
                }
                else
                {
                    toastr()->error('Standard Not Added!!!');
                } 
            }
            else
            {
                toastr()->error('Standard Already Exists!!! ');
            }         
            toastr()->success('Standard Successfully Added!');
            return redirect('view-standard');

            }
    }



    public function delete_standard($id){ 
        $data['result']=Standerd::where('id',$id)->delete();
        toastr()->error('Standard Deleted !');
        return redirect('view-standard');
    }

    public function edit_standard($id){
        $data['flag'] = 10; 
        $data['page_title'] = 'Edit Standard'; 
        $data['standard'] = Standerd::where('id',$id)->first();  
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function view_semister()
    {
       
        $data['flag'] = 12; 
        $data['page_title'] = 'All Semister';  
        $data['semister'] = Semister::get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_semister()
    {
        $data['flag'] = 13; 
        $data['page_title'] = 'Add Semister';        
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function submit_semister(Request $req)
    {
    //    dd($req);
        $this->validate($req,[
            'semister_name'=>'required',        
            'status'=>'nullable|numeric'             
         ]);


         if($req->id) { 

            Semister::where('id',$req->id)->update([
                'semister_name' => $req->semister_name,
                'status' => $req->status,
            ]);
            toastr()->success('Semister Updated Successfully!');
            return redirect('view-semister');

         }else{

                $result = Semister::where('semister_name', $req->semister_name)->first(); 
                if(!$result)
                {   
                // ======================================
                $data = new Semister;
                    $data->semister_name=$req->semister_name;            
                    $data->status=$req->status;             
                    $result = $data->save();
                if($result)
                {
                    toastr()->success('Semister Successfully Added!');
                }
                else
                {
                    toastr()->error('Semister Not Added!!!');
                } 
            }
            else
            {
                toastr()->error('Semister Already Exists!!! ');
            }         
            toastr()->success('Semister Successfully Added!');
            return redirect('view-semister');

            }
    }



    public function delete_semister($id){ 
        $data['result']=Semister::where('id',$id)->delete();
        toastr()->error('Semister Deleted !');
        return redirect('view-semister');
    }

    public function edit_semister($id){
        $data['flag'] = 14; 
        $data['page_title'] = 'Edit Semister'; 
        $data['semister'] = Semister::where('id',$id)->first();  
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function view_chapter()
    {
       $data['flag'] = 7; 
       $data['page_title'] = 'All Chapter';  
       $data['chapters'] = chapter::get();     
       return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_chapter()
    {
        $data['flag'] = 4; 
        $data['page_title'] = 'Add Chapter'; 
        $data['subjects'] = DB::table('subjects')->where('status',"1")->get(); 
        return view('Admin/webviews/manage_admin_user',$data);
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

    public function view_college()
    {
       $data['flag'] = 8; 
       $data['page_title'] = 'All College';  
       $data['college'] = College::get();     
       return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_college()
    {
        $data['flag'] = 9; 
        $data['page_title'] = 'Add College';        
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function submit_college(Request $req)
    {
    //    dd($req);
        $this->validate($req,[
            'college_name'=>'required',        
            'status'=>'nullable|numeric'              
         ]);


         if($req->id) { 

            College::where('id',$req->id)->update([
                'college_name' => $req->college_name,
                'status' => $req->status,
            ]);
            toastr()->success('College Updated Successfully!');
            return redirect('view-college');

         }else{

            $result = College::where('college_name', $req->college_name)->first();  
                if(!$result)
                {   
                // ======================================
                $data = new College;
                $data->college_name=$req->college_name;            
                $data->status=$req->status;             
                $result = $data->save();
                if($result)
                {
                    toastr()->success('College Successfully Added!');
                }
                else
                {
                    toastr()->error('College Not Added!!!');
                } 
            }
            else
            {
                toastr()->error('College Already Exists!!! ');
            }         
            toastr()->success('College Successfully Added!');
            return redirect('view-college');

            }
    }

    public function delete_college($id){ 
        $data['result']=College::where('id',$id)->delete();
        toastr()->error('College Deleted !');
        return redirect('view-college');
    }

    public function edit_college($id){
        $data['flag'] = 11; 
        $data['page_title'] = 'Edit College'; 
        $data['college'] = College::where('id',$id)->first();  
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }
    
}

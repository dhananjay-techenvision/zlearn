<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use App\Categories;

use DB;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['page_title'] = 'Dashboard'; 
    	return view('Students/Webviews/student_dashboard',$data);
    }

    public function resume_page_one()
    {
        $data['page_title'] = 'Resume Form One';
        $u_id = Auth::User()->id;
        $data['user'] = User::where('id',$u_id)->first();      
        return view('Students/Webviews/student_add_resume',$data);

    }
}

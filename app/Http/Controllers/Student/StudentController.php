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
    	return view('Students/webviews/student_dashboard',$data);
    }
}

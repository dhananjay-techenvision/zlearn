<!DOCTYPE html>
<html lang="en"
    dir="ltr">
    <head>
        @include('Students.Common.student_head')
    </head>
    <body class="layout-app ">
        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
            
            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>
        
        <!-- Drawer Layout -->
        
        <div class="mdk-drawer-layout js-mdk-drawer-layout"
            data-push
            data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">
                
                <!-- Header -->
                
                <!-- Navbar -->
                
                @include('Students.Common.student_navbar')
                
                <!-- // END Navbar -->
                
                <!-- // END Header -->
                <div class="pt-32pt">
                    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
                            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                <h2 class="mb-0">Dashboard</h2>
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index.html">Student</a></li>
                                    <li class="breadcrumb-item active">
                                        Basic Information
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- <div class="row"
                            role="tablist">
                            <div class="col-auto">
                                <a href="student-my-courses.html"
                                class="btn btn-outline-secondary">My Courses</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- BEFORE Page Content -->
                <!-- // END BEFORE Page Content -->
                <!-- Page Content -->
                <div class="container page__container">
                    <div class="page-section row">                                        
                        <form class="form-group col-md-10 m-auto" action="{{url('Basic-Info')}}" method="POST">
                        @csrf 
                            <!-- <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">NAME:</label>
                                <input type="text" class="form-control col-md-9"
                                placeholder="Enter Your Name">
                            </div> -->
                             <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="">First NAME</label>
                                    <input type="text" class="form-control" name="first_name" id="" placeholder="Enter Your First Name" value="{{$user->name}}" required="">                                    
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="">Last NAME</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Your Last Name" name="last_name" value="{{$user->l_name}}" required="">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-4 col-md-3 p-2">GENDER:</label>
                                <div class="custom-control custom-radio col-md-9 col-8 p-2">
                                    <span class="mr-3">                                         
                                         <input type="radio" id="" name="gender" value="1" class="" checked>
                                         <label for="Male" class="pl-1">Male</label>          
                                    </span>
                                    <span class="ml-3">                                        
                                        <input type="radio" id="" name="gender" value="0">
                                         <label for="Female" class="pl-1">Female</label>     
                                    </span>
                                </div>                                
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">DATE OF BIRTH:</label>
                                <input id="" type="date" class="form-control col-md-9" name="bod_date" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">YOUR EMAIL:</label>
                              <input type="email" class="form-control col-md-9" id="" value="{{$user->email}}" placeholder="Enter Your Email Address .." required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">CONTACT DETAILS:</label>
                                <input type="text" class="form-control col-md-9" id="" name="phone_no" value="{{$user->phone}}" placeholder="Enter Your MOBILE Number .." required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">CAMPUS:</label>
                                <input id="" type="text" class="form-control col-md-9" placeholder="Enter Campus Name" name="campus" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 col-4 p-2">EDUCATION:</label>
                                <div class="custom-control custom-radio co-md-9 col-8 p-2">
                                    <span class="mr-3">                                         
                                         <input type="radio" id="" name="education" value="UG" class="" checked>
                                         <label for="UG" class="pl-1">UG</label>          
                                    </span>
                                    <span class="ml-3">                                         
                                        <input type="radio" id="" name="education" value="PG" class="" >             
                                         <label for="PG" class="pl-1">PG</label>     
                                    </span>
                                </div>                                
                            </div>
                             <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">DEGREE:</label>
                                <select id="" name="degree" class="form-control custom-select col-md-9" required="">
                                    <option value="" selected>Select Degree</option>
                                    <option value="1">BE</option>
                                    <option value="2">MBA</option>
                                    <option value="3">BCOM</option>
                                    <option value="4">BBA</option>
                                    <option value="5">MCA</option>    
                                </select>                               
                            </div>
                            <div class="form-group row">
                                <label class="form-label col-md-3 p-2">SEMESTER:</label>
                                <select id="" name="semester" class="form-control custom-select col-md-9" required="">
                                    <option value="" selected>Select Semester </option>
                                    <option value="1">1 Semester</option>
                                    <option value="2">2 Semester</option>
                                    <option value="3">3 Semester</option>
                                    <option value="4">4 Semester</option>
                                    <option value="5">5 Semester</option>
                                    <option value="6">6 Semester</option>
                                    <option value="7">7 Semester</option>
                                    <option value="8">8 Semester</option>    
                                </select>                               
                            </div>
                            <div class="form-group row">
                                <label class="form-label col-md-3 p-2">USN/ROLL NUMBER:</label>
                                <input id="" type="text" class="form-control col-md-9" placeholder="Enter USN / Roll Number" name="roll_no" required="">
                            </div>
                            <!-- <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="">MOTHER’S NAME</label>
                                    <input type="text" class="form-control" name="mother_name" id="" placeholder="Enter MOTHER’S NAME" required="">                                    
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="">FATHER’S NAME</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter FATHER’S NAME" name="father_name" required="">
                                </div>
                            </div> -->
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">MOTHER’S NAME:</label>
                                <input id="" type="text" class="form-control col-md-9" placeholder="Enter MOTHER’S NAME" name="mother_name" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">FATHER’S NAME:</label>
                                <input id="" type="text" class="form-control col-md-9" name="father_name" placeholder="Enter FATHER’S NAME" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">OCCUPATION:</label>
                                <input id="" type="text" class="form-control col-md-9" name="occupation" placeholder="Enter Occupation" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">PERMANENT ADDRESS:</label>
                                <textarea class="form-control col-md-9" name="permanent_address" placeholder="Enter Permanent Address" required=""></textarea>
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">CURRENT ADDRESS:</label>
                                <textarea class="form-control col-md-9" name="current_address" placeholder="Enter Current Address" required=""></textarea>
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">KYC-AADHAR AND PAN:</label>
                                 <input id="" type="text" class="form-control col-md-9"  placeholder="Enter AADHAR / PAN" name="kyc_doc" required="">
                            </div>
                            <div class="form-group row ">
                                <label class="form-label col-md-3 p-2">UPLOAD KYC:</label>
                                <div class="custom-file col-md-9">
                                    <input type="file" id="file" class="custom-file-input" name="upload_kyc_doc">
                                    <label for="file" class="custom-file-label">Choose file</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label class="form-label col-md-3 p-2">BLOOD GROUP:</label>
                                <input id="" type="text" class="form-control col-md-9" placeholder="Enter Blood Group" name="blood_group" required="">
                            </div>
                            <div class="form-group row">
                                <div class="col-10 m-auto text-right pt-3">
                                    <button type="reset" name="reset" class="btn btn-secondary mr-2">Reset</button>
                                    <button name="submit" class="btn btn-primary">Next</button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                <!-- // END Page Content -->
                <!-- Footer -->
                @include('Students.Common.student_footertext')
                <!-- // END Footer -->
            </div>
            <!-- // END drawer-layout__content -->
            <!-- Drawer left sidebar start -->
            @include('Students.Common.student_sidebar')
            <!-- // END Drawer sidebar ends -->
        </div>
        <!-- // END Drawer Layout -->
        @include('Students.Common.student_footer')
        
    </body>
</html>
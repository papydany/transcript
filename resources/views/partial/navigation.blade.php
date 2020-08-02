@inject('R','App\General');
<?php $role =$R->getrolename(Auth::user()->id);
$user =$R->getuser(Auth::user()->id);?>


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">{{$role->desc}} </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
  
        
  
      
  
        <!-- Nav Item - Pages Collapse Menu -->
        @if($role->name == 'sa')
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setup" aria-expanded="true" aria-controls="setup">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setup</span>
          </a>
          <div id="setup" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Set Up</h6>
              <a class="collapse-item" href="{{url('issuingOfficer')}}">Issuing Officer</a>
              <a class="collapse-item" href="{{url('vc')}}">VC</a>
              <a class="collapse-item" href="{{url('registrar')}}">Registrar</a>

   
            </div>
            
           
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Officer</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Officer:</h6>
              <a class="collapse-item" href="{{url('createDeskofficer')}}">Create Officer</a>
              <a class="collapse-item" href="{{url('viewDeskofficer')}}">View Deskofficer</a>
              <a class="collapse-item" href="{{url('deactivatedAccount')}}">Deactivated Account</a>
            </div>
          </div>
        </li>
  
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Faculty & Department</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Faculty:</h6>
              <a class="collapse-item" href="{{url('faculty')}}">new</a>
              <h6 class="collapse-header">Department:</h6>
              <a class="collapse-item" href="{{url('department')}}">new</a>
            
            </div>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#courses" aria-expanded="true" aria-controls="courses">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Course</span>
            </a>
            <div id="courses" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Courses:</h6>
                <a class="collapse-item" href="{{url('courses')}}">new</a>
                <a class="collapse-item" href="{{url('viewCourses')}}">view</a>
                <h6 class="collapse-header">SSCE SUBJECT:</h6>
                <a class="collapse-item" href="{{url('subjects')}}">new</a>
                <a class="collapse-item" href="{{url('viewSubjects')}}">view</a>
              
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#program" aria-expanded="true" aria-controls="program">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Programme</span>
            </a>
            <div id="program" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Programme:</h6>
                <a class="collapse-item" href="{{url('programmes')}}">new</a>
                <a class="collapse-item" href="{{url('viewProgrammes')}}">view</a>
                <h6 class="collapse-header">Specialization:</h6>
                <a class="collapse-item" href="{{url('specializations')}}">new</a>
                <a class="collapse-item" href="{{url('viewSpecializations')}}">view</a>
              
              </div>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Assign_Programme" aria-expanded="true" aria-controls="Assign_Programme">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Assign Programme</span>
              </a>
              <div id="Assign_Programme" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Assign Programme</h6>
                  <a class="collapse-item" href="{{url('assignProgrammes')}}">new</a>
                  <a class="collapse-item" href="{{url('viewAssignProgrammes')}}">view</a>
                
                </div>
              </div>
            </li>
       @elseif($role->name == 'do')
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="student">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Student</span>
        </a>
        <div id="student" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students</h6>
            <a class="collapse-item" href="{{url('students')}}">new</a>
            <a class="collapse-item" href="{{url('viewStudents')}}">view</a>
          
          </div>
        </div>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#re_courses" aria-expanded="true" aria-controls="re_courses">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Register Courses</span>
          </a>
          <div id="re_courses" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Register Courses</h6>
              <a class="collapse-item" href="{{url('registerCourses')}}">new</a>
              <a class="collapse-item" href="{{url('viewRegisterCourses')}}">view</a>
            
            </div>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enterresult" aria-expanded="true" aria-controls="enterresult">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Enter Result</span>
            </a>
            <div id="enterresult" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Enter Result</h6>
                <a class="collapse-item" href="{{url('getStudents')}}">Get Student</a>
               
                <a class="collapse-item" href="{{url('getRegisteredStudents')}}">Registered Student</a>
              </div>
            </div>
          </li>
      @elseif($role->name == 'TO')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="student">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Student</span>
        </a>
        <div id="student" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students</h6>
           
            <a class="collapse-item" href="{{url('studentDetail')}}">view</a>
            <a class="collapse-item" href="{{url('courseTitle')}}">Course Title</a>
            <a class="collapse-item" href="{{url('getresultDetail')}}">Result Detail</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cover" aria-expanded="true" aria-controls="cover">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Cover Letter</span>
        </a>
        <div id="cover" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cover Letter</h6>
            <a class="collapse-item" href="{{url('destinationAddress')}}">Destination Address </a>
            <a class="collapse-item" href="{{url('getCoverLetter')}}">Generate</a>
          
          </div>
        </div>
      </li>

       @endif
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#changepassword" aria-expanded="true" aria-controls="changepassword">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Change Password</span>
        </a>
        <div id="changepassword" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Change Password</h6>
            <a class="collapse-item" href="{{url('changePassword')}}">Change Password</a>
          
          
          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Transcript" aria-expanded="true" aria-controls="Transcript">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Transcript</span>
        </a>
        <div id="Transcript" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transcript</h6>
            <a class="collapse-item" href="{{url('transcript')}}">Transcript</a>
          
          
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Logout</span></a>
      </li>
    
  
        
  
      
     
  
      </ul>
      <!-- End of Sidebar -->
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

      

         

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="{{url('/')}}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->name}}</span>
             
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             
              
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
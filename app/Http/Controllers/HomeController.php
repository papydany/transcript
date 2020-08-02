<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Audit;
use App\Role;
use App\User;
use App\Faculty;
use App\Department;
use App\Category;
use App\Semester;
use App\Course;
use App\Programme;
use App\Specialization;
use App\AssignProgramme;
use App\IssuingOfficer;
use App\Subject;
use App\VC;
use App\Registrar;
use Session;
use DB;
class HomeController extends Controller
{
    Const Sa =1;
    Const Active =1;
    Const Nonactive =0;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }
//========================= create deskofficer===============================
    public function createDeskofficer()
    {
        $role =Role::get();
       
    return view('home.deskofficer.index',['role'=>$role]);
    }
//------------------- post create deskofficer --------------------------
     public function post_createDeskofficer(Request $request)
    {
        
        $request->validate([
        'email' => 'required|string|email|max:255|unique:users',
        'name' => 'required',
        'phone' => 'required',
        'role' => 'required',
    ]);
        $u =New User;
        $u->name =strtoupper($request->name);
        $u->email =$request->email;
        $u->password =bcrypt($request->password);
        $u->phone = $request->phone;
        $u->status = 1;
        $u->save();

        $user_role =DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' =>$request->role]);
        
       
$request->session()->flash('success', 'account was successfuly Created!');
 return redirect()->action('HomeController@createDeskofficer');  
   
    }

    public function viewDeskofficer()
    {
            $user=DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id','!=',self::Sa)
            ->where('users.status',self::Active)
            ->orderBy('name','ASC')
            ->select('users.*')
            ->get();
        if(count($user) == 0)
        {
        $user =''; 
        }
        
        
        
        return view('home.deskofficer.view',['user'=>$user]);
    }
    public function deactivatedAccount()
    {
            $user=DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id','!=',self::Sa)
            ->where('users.status',self::Nonactive)
            ->orderBy('name','ASC')
            ->select('users.*')
            ->get();
        if(count($user) == 0)
        {
        $user =''; 
        }
        
        
        
        return view('home.deskofficer.deactivatedAccount',['user'=>$user]);
    }
    //------------------- activate account --------------------
public function activateAccount(Request $request,$id)
{
$u =User::find($id);
$u->status =1;
$u->save();
 $request->session()->flash('success', 'Account was Activated  successfuly !');
 return redirect()->action('HomeController@deactivatedAccount');
}

public function deactivateAccount(Request $request,$id)
{
$u =User::find($id);
$u->status =0;
$u->save();
 $request->session()->flash('success', 'Account was Deactivated  successfuly !');
 return redirect()->action('HomeController@viewDeskofficer');
}
//============================ faculty ==========================
public function faculty()
{
    $check =Faculty::orderBy('name','ASC')->get();
  if(count($check) == 0)
    {
    $check =''; 
    }
   return view('home.faculty.index',['collection'=>$check]);
}
//------------------- post faculty --------------------------
public function postfaculty(Request $request)
{
    $name=strtoupper($request->name);
    $check =Faculty::where('name',$name)->get()->count();
    if($check == 0)
    {
$fac = New Faculty;
$fac->name =$name;
$fac->save();
$request->session()->flash('success', 'Faculty was successfuly Created!');

    }
    else
    {
$request->session()->flash('warning', 'Faculty created already');
    }

return redirect()->action('HomeController@faculty');    
  
}

//----------------------- edit faculty ----------------------------------------------
public function editFaculty($id)
{
    $fac =Faculty::find($id);
    return view('home.faculty.edit',['collection'=>$fac]);
}

//------------------------- update faculty --------------------------------------------
public function updateFaculty(Request $request)
{
    $id =$request->id;
    $name=strtoupper($request->name);
    $fac =faculty::find($id);
    $fac->name =$name;
    $fac->save();
    $request->session()->flash('success', 'Faculty was successfuly Created!');
 return redirect()->action('HomeController@faculty');    
 
}

//====================department ============================

public function department()
{
$f=Faculty::orderBy('name','ASC')->get();
return view('home.department.index',['f'=>$f]);
}
//------------------- post department --------------------------
 public function postdepartment(Request $request)
{
    $name=strtoupper($request->name);
    $fac_id=$request->faculty_id;
    $check =Department::where([['name',$name],['faculty_id',$fac_id]])->get()->count();
    if($check == 0)
    {
$d = New Department;
$d->name =$name;
$d->faculty_id =$fac_id;
$d->save();
$request->session()->flash('success', 'Department was successfuly Created!');

    }
    else
    {
$request->session()->flash('warning', 'Department created already');
    }

return redirect()->action('HomeController@department');     
 
}
//----------------------- edit department ----------------------------------------------
public function editDepartment($id)
{
$d =Department::find($id);

return view('home.department.edit',['d'=>$d]);
}

//------------------------- update department --------------------------------------------
public function updateDepartment(Request $request)
{
$id =$request->id;
$name=strtoupper($request->name);
$d =Department::find($id);
$d->name =$name;
$d->save();
$request->session()->flash('success', 'Department was successfuly Created!');
return redirect()->action('HomeController@department');     

}

//=====================courses ==========================
public function course(Request $request)
{
$c =Category::get();
$s =Semester::get();
return view('home.courses.index',['c'=>$c,'s'=>$s]);
}

//-------------------------------------new courses ----------------------------------------------
function postcourse(Request $request)
{
    //$this->validate($request,array('semester'=>'required','category'=>'required',));
    $semester = $request->input('semester_id');
    $category =$request->input('category_id');
    $variable = $request->input('code');
    $title = $request->input('title');
    $unit = $request->input('unit');
     
if($variable == null)
{
Session::flash('warning',"course Code is empty");
return back();
}
    foreach ($variable as $key => $value) {
    if(!empty($value)) {
        $cc =strtoupper(str_ireplace(" ","",$value));
if($title[$key] != ''){
    $clean_list[$cc] =array('title'=>strtoupper($title[$key]),'unit'=>$unit[$key],'code'=>$cc);
}
    }
    }

foreach($clean_list as $kk=>$vv ){
$code[] = $vv['code'];

}

$check =Course::whereIn('code',$code)->where([['semester_id',$semester],['category_id',$category]])->get();
if(count($check) > 0)
{
foreach ($check as $key => $value) {
unset($clean_list[$value->code]);
}

}

if(count($clean_list) != 0)
{
foreach($clean_list as $k=>$v ){
$data[] =['title' => $clean_list[$k]['title'], 'code' =>$clean_list[$k]['code'],'unit'=>$clean_list[$k]['unit'],'semester_id'=>$semester,'category_id'=>$category];
}
DB::table('courses')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
    Session::flash('warning',"courses code exist already.");
}
return redirect()->action('HomeController@course');

}

//-------------------------------------view courses ----------------------------------------------

public function viewCourses()
{
    $c =Category::get();
    $s =Semester::get();
    return view('home.courses.view',['c'=>$c,'s'=>$s]);
}

public function postviewCourses(request $request)
{
$c =Category::get();
$s =Semester::get();
$category =$request->category_id;
$semester=$request->semester_id;
$cat =Category::find($category);
$sem =Semester::find($semester);

$course =Course::where([['category_id',$category],['semester_id',$semester]])
   ->orderBy('code','ASC')->get();  
   
   return view('home.courses.view',['c'=>$c,'s'=>$s,'course'=>$course,'sem'=>$sem,'cat'=>$cat]);      
}
//---------------------------Edit Courses ---------------------------------------------------

public function editCourse($id)
{
$c = Course::find($id);
$s =Semester::get();
return view('home.courses.edit',['c'=>$c,'s'=>$s]);
}

public function updateCourse(Request $request)
{
$code = strtoupper($request->code);
$check =Course::where('code',$code)->first();
if($check->id != $request->id )
{
  Session::flash('warning',"the course code exist already.");
  return back();
}
$c = Course::find($request->id);

$c->title =strtoupper($request->title);
$c->code =strtoupper($request->code);
$c->unit =$request->unit;
$c->semester_id =$request->semester_id;
$c->save();
Session::flash('success',"SUCCESSFULL.");
return redirect()->action('HomeController@viewCourses');
}
//=====================programme ====================
public function programme(){
       
    $d = Department::orderBy('name','ASC')->get();
        $c = Category::all(); 
        return view('home.programme.index',['c'=>$c,'d'=>$d]);
    }
    

  //======================================== post programme =====================================
    function postprogramme(Request $request)
    {
  $department =$request->input('department_id');
  $category =$request->input('category_id');
  $variable = $request->input('name');
  $level = $request->input('level');
  $degree = $request->input('degree');
if($variable == null)
{
Session::flash('warning',"programme name  is empty");
return back();
}
  foreach ($variable as $key => $value) {
  if(!empty($value)) {
      $cc =strtoupper($value);
  $clean_list[$cc] =array('level'=>$level[$key],'degree'=>$degree[$key],'name'=>$cc);

  }
  }

foreach($clean_list as $kk=>$vv ){
$name[] = $vv['name'];

}

$check =Programme::whereIn('name',$name)->where([['department_id',$department],['category_id',$category]])->get();
if(count($check) > 0)
{
foreach ($check as $key => $value) {
unset($clean_list[$value->name]);
}
  
}

if(count($clean_list) != 0)
{
foreach($clean_list as $k=>$v ){
$data[] =['level' => $clean_list[$k]['level'], 'degree' => $clean_list[$k]['degree'],'name' =>$clean_list[$k]['name'],'department_id'=>$department,'category_id'=>$category];
}
DB::table('programmes')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
  Session::flash('warning',"programme names exist already.");
}
return redirect()->action('HomeController@programme');  
}
//========================================== view Programme=======================================
public function viewProgrammes()
{
    $d = Department::orderBy('name','ASC')->get();
    return view('home.programme.view',['d'=>$d]);
}
//==============================post view programme ============================================================
public function postviewProgrammes(Request $request)
{
$d = Department::orderBy('name','ASC')->get();
$id =$request->department_id;
$depart =Department::find($id);
$p = Programme::where('department_id',$id)->orderBy('category_id','ASC')->get();
return view('home.programme.view',['d'=>$d,'p'=>$p,'depart'=>$depart]);
}
//==============================edit programme=================================
public function editProgramme($id)
{
$p =Programme::find($id);
return view('home.programme.edit',['p'=>$p]);
}
//==============================update Programme=================================
public function updateProgramme(Request $request)
{
$id = $request->id;
$f =Programme::find($id);
$f->name = strtoupper($request->name);
$f->degree = $request->degree;
$f->level =$request->level;
$f->save();
Session::flash('success',"SUCCESSFULL.");
return redirect()->action('HomeController@viewProgrammes');
}

//=====================specialization ====================
public function specialization(){
       $d = Department::orderBy('name','ASC')->get();
    return view('home.specialization.index',['d'=>$d]);
    }
    

  //======================================== post specialization =====================================
    function postspecialization(Request $request)
    {
  $p =$request->input('programme_id');
  $variable = $request->input('name');
  $level = $request->input('level');
   
if($variable == null)
{
Session::flash('warning',"specialization name  is empty");
return back();
}
  foreach ($variable as $key => $value) {
  if(!empty($value)) {
      $cc =strtoupper($value);
  $clean_list[$cc] =array('level'=>$level[$key],'name'=>$cc);

  }
  }

foreach($clean_list as $kk=>$vv ){
$name[] = $vv['name'];

}

$check =Specialization::whereIn('name',$name)->where([['programme_id',$p]])->get();
if(count($check) > 0)
{
foreach ($check as $key => $value) {
unset($clean_list[$value->name]);
}
  
}

if(count($clean_list) != 0)
{
foreach($clean_list as $k=>$v ){
$data[] =['level' => $clean_list[$k]['level'], 'name' =>$clean_list[$k]['name'],'programme_id'=>$p];
}
DB::table('specializations')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
  Session::flash('warning',"specialization names exist already.");
}
return redirect()->action('HomeController@specialization');  
}
//========================================== view Specialization=======================================
public function viewSpecializations()
{
    $d = Department::orderBy('name','ASC')->get();
    return view('home.specialization.view',['d'=>$d]);
}
//==============================post view specialization ============================================================
public function postviewSpecializations(Request $request)
{
$d = Department::orderBy('name','ASC')->get();
$id =$request->programme_id;
$s = Specialization::where('programme_id',$id)->orderBy('name','ASC')->get();
return view('home.specialization.view',['d'=>$d,'s'=>$s]);
}
//==============================edit specialization================================
public function editSpecialization($id)
{
$s =Specialization::find($id);
return view('home.specialization.edit',['s'=>$s]);
}
//==============================updateSpecialization=================================
public function updateSpecialization(Request $request)
{
$id = $request->id;
$f =Specialization::find($id);
$f->name = strtoupper($request->name);
$f->level =$request->level;
$f->save();
Session::flash('success',"SUCCESSFULL.");
return redirect()->action('HomeController@viewSpecializations');
}

public function getprogrammebydepartment($id)
{
    $p =Programme::where('department_id',$id)->get();
    return response()->json($p);
}

public function getdepartmentbyfaculty($id)
{
    $p =Department::where('faculty_id',$id)->get();
    return response()->json($p);
}
//===========assign programme==============

public function assignProgrammes(Request $request)
{
$f=Faculty::orderBy('name','ASC')->get();
return view('home.assignprogramme.index',['f'=>$f]);
}

public function postAssignProgrammes(Request $request)
{
$f=Faculty::orderBy('name','ASC')->get();
$d=$request->depart_id;
$p =Programme::where('department_id',$d)->orderBy('name','ASC')->get();
$u=DB::table('users')
->join('user_roles', 'users.id', '=', 'user_roles.user_id')
->where('user_roles.role_id','!=',self::Sa)
->where('users.status',self::Active)
->orderBy('name','ASC')
->select('users.*')
->get();
return view('home.assignprogramme.index',['f'=>$f,'p'=>$p,'u'=>$u,'d'=>$d]);
}
public function assignProgrammesToOfiicer(Request $request)
{
  $f=Faculty::orderBy('name','ASC')->get();
  $variable = $request->input('programme');
  $v=[];
    if($variable == null)
    {
    
    return back();
    }
    $id =$request->optradio;
    
    foreach ($variable as $key => $value)
    {
     $check =AssignProgramme::where([['programme_id',$value],['user_id',$id]])->first();
     if($check ==  null){
      $v[] = ['programme_id'=>$value,'user_id'=>$id];
     }
    
    }
    if(count($v) != 0){
      DB::table('assign_programmes')->insert($v);
      Session::flash('success',"Successfull.");
    }else{
      Session::flash('warning',"No records added.");
    }
    
    return redirect()->action('HomeController@assignProgrammes');
}

//=================== viewAssignProgrammes =====================
public function viewAssignProgrammes()
{
    $f=Faculty::orderBy('name','ASC')->get();
    return view('home.assignprogramme.view',['f'=>$f]); 
}

public function postviewAssignProgrammes(Request $request)
{
    $d =$request->depart_id;
    $c=array();
    $f=Faculty::orderBy('name','ASC')->get();
    $p =Programme::where('department_id',$d)->get();
    foreach($p as $v)
    {
        $c[] =$v->id;
    }
    
    $ap=AssignProgramme::whereIn('programme_id',$c)->get();
    return view('home.assignprogramme.view',['f'=>$f,'ap'=>$ap]);
}

//========================= issuing officer===============================
public function issuingOfficer()
{
    $i =IssuingOfficer::first();
   
return view('home.issuingofficer.index',['i'=>$i]);
}
//------------------- post issuing Officer --------------------------
 public function post_issuingOfficer(Request $request)
{
  $exist =  IssuingOfficer::first();
  if($exist == null){
 $i =New IssuingOfficer;
$i->name =strtoupper($request->name);
$i->position =$request->position;
$i->save();
  }else{
      $exist->name=strtoupper($request->name);
      $exist->position =$request->position;
$exist->save();
  }
$request->session()->flash('success', 'account was successfuly Created!');
return redirect()->action('HomeController@issuingOfficer');  

}

//========================= vc===============================
public function vc()
{
    $i =VC::first();
   
return view('home.vc.index',['i'=>$i]);
}
//------------------- post vc--------------------------
 public function post_vc(Request $request)
{
  $exist =  VC::first();
  if($exist == null){
 $i =New VC;
$i->name =$request->name;
$i->position =$request->position;
$i->email =$request->email;
$i->save();
  }else{
      $exist->name=$request->name;
      $exist->position =$request->position;
      $exist->email =$request->email;
$exist->save();
  }
$request->session()->flash('success', 'account was successfuly Created!');
return redirect()->action('HomeController@vc');  

}

//========================= registrar ===============================
public function registrar()
{
    $i =Registrar::first();
   
return view('home.registrar.index',['i'=>$i]);
}
//------------------- post registrar --------------------------
 public function post_registrar(Request $request)
{
  $exist =  Registrar::first();
  if($exist == null){
 $i =New Registrar;
$i->name =$request->name;
$i->position =$request->position;
$i->email =$request->email;
$i->save();
  }else{
      $exist->name=$request->name;
      $exist->position =$request->position;
      $exist->email =$request->email;
$exist->save();
  }
$request->session()->flash('success', 'account was successfuly Created!');
return redirect()->action('HomeController@registrar');  

}

//=====================subject ==========================
public function subject(Request $request)
{

return view('home.subjects.index');
}

//-------------------------------------new subject ----------------------------------------------
function postsubject(Request $request)
{
 
$variable = $request->input('name');
if($variable == null)
{
Session::flash('warning',"subject is empty");
return back();
}
    foreach ($variable as $key => $value) {
    if(!empty($value)) {
        $cc =strtoupper($value);
$clean_list[$cc] =array('name'=>$cc);

    }
    }

foreach($clean_list as $kk=>$vv ){
$code[] = $vv['name'];

}

$check =Subject::whereIn('name',$code)->get();
if(count($check) > 0)
{
foreach ($check as $key => $value) {
unset($clean_list[$value->name]);
}

}

if(count($clean_list) != 0)
{
foreach($clean_list as $k=>$v ){
$data[] =[ 'name' =>$clean_list[$k]['name']];
}
DB::table('subjects')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
    Session::flash('warning',"subjects exist already.");
}
return redirect()->action('HomeController@subject');

}

//-------------------------------------view Subject ----------------------------------------------

public function viewSubjects()
{$s =Subject::get();

 return view('home.subjects.view',['s'=>$s]);
}


//---------------------------Edit subject ---------------------------------------------------

public function editSubject($id)
{
$s =Subject::find($id);
return view('home.subjects.edit',['s'=>$s]);
}

public function updateSubject(Request $request)
{

$c = Subject::find($request->id);
$c->name =strtoupper($request->name);

$c->save();
Session::flash('success',"SUCCESSFULL.");
return redirect()->action('HomeController@viewSubjects');
}

public function home_update()
{
    $r =array();
$result = DB::connection('oldporta')->table('courses')->where('thecourse_title','')->get();

foreach($result as $v)
{
$r[]=$v->thecourse_id;
}
$result2 = DB::connection('oldporta')->table('all_courses')->where('course_title','!=','')
->whereIn('thecourse_id',$r)->distinct()->get();

foreach($result2 as $vv)
{
    $result_u = DB::connection('oldporta')->table('courses')->where('thecourse_id',$vv->thecourse_id)
    ->update(['thecourse_title' => $vv->course_title]); 
}
echo 'successfull';

}

}

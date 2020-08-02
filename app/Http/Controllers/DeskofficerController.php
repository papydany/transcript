<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AssignProgramme;
use App\Faculty;
use App\Department;
use App\Programme;
use App\Student;
use App\State;
use App\Semester;
use App\Course;
use App\RegisterCourse;
use App\Result;
use App\RegisteredStudent;
use App\IssuingOfficer;
use App\Subject;
use App\SsceGrade;
use App\SsceType;
use App\Lga;
use App\BarcodeLog;
use App\BarcodeLogDetail;
use Milon\Barcode\DNS2D;
use App\Alltranscript;
use DNS1D;
use Auth;
use Session;
use DB;
use PDF;


class DeskofficerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ap =AssignProgramme::where('user_id',Auth::id())->get();
        $f =Faculty::get();// for super admin
        return view('deskofficer.student.index',['ap'=>$ap,'f'=>$f]);
    }

    //-------------------------------------post students ----------------------------------------------
function students(Request $request)
{

    $entry_year =$request->input('entry_year');
    $programme =$request->input('programme_id');
    $variable = $request->input('matricNumber');
    $surname = $request->input('surname');
    $firstname = $request->input('firstname');
    $othername = $request->input('othername');

if($variable == null)
{
Session::flash('warning',"students info  is empty");
return back();
}
// get programmes details

$p =Programme::find($programme);
$d=Department::find($p->department_id);
    foreach ($variable as $key => $value) {
    if(!empty($value)) {
        $cc =strtoupper(str_ireplace(" ","",$value));

    $clean_list[$cc] =array('surname'=>strtoupper($surname[$key]),'firstname'=>strtoupper($firstname[$key]),'othername'=>strtoupper($othername[$key]),'matricNumber'=>$cc);

    }
    }

foreach($clean_list as $kk=>$vv ){
$code[] = $vv['matricNumber'];

}

$check =Student::whereIn('matricNumber',$code)->get();
if(count($check) > 0)
{
foreach ($check as $key => $value) {
unset($clean_list[$value->matricNumber]);
}
    
}

if(count($clean_list) != 0)
{
foreach($clean_list as $k=>$v ){
$data[] =['surname' => $clean_list[$k]['surname'], 'matricNumber' =>$clean_list[$k]['matricNumber'],
'firstname'=>$clean_list[$k]['firstname'],'othername'=>$clean_list[$k]['othername'],'category_id'=>$p->category_id,
'faculty_id'=>$d->faculty_id,'department_id'=>$p->department_id,'programme_id'=>$p->id,'entry_year'=>$entry_year];
}

DB::table('students')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
    Session::flash('warning',"students matric numbers exist already.");
}
return redirect()->action('DeskofficerController@students');

}

public function viewStudents(Request $request)
{$s='';
    $ap =AssignProgramme::where('user_id',Auth::id())->get();
    $f =Faculty::get();// for super admin
    
   
    
   if($request->isMethod('post')){
    $p =Programme::find($request->programme_id);
    $year =$request->entry_year;
    
    $next =$year + 1;
    $s=Student::where([['programme_id',$request->programme_id],['entry_year',$request->entry_year]])->get();
    return view('deskofficer.student.view',['ap'=>$ap,'f'=>$f,'s'=>$s,'p'=>$p,'next'=>$next,'y'=>$year]);
}else{
    return view('deskofficer.student.view',['ap'=>$ap,'f'=>$f]);
}
    
}

public function editStudent($id)
{
  $s=Student::find($id);
  $st =State::orderBy('state_name','Asc')->get();
    return view('deskofficer.student.edit',['s'=>$s,'st'=>$st]);
}

public function updateStudent(Request $request)
{
  $s=Student::find($request->id);
  $s->surname =strtoupper($request->surname);
  $s->firstname =strtoupper($request->firstname);
  $s->othername =strtoupper($request->othername);
  $s->matricNumber=strtoupper($request->matricNumber);
  $s->email =$request->email;
  $s->phone =$request->phone;
  if($request->state_id != ''){
  $s->state_id =$request->state_id;
  
  }
  if($request->localgovt_id != ''){
  $s->lga_id =$request->localgovt_id;
  }
  if($request->entry_year != ''){
  $s->entry_year =$request->entry_year;
  }
  if($request->gender != ''){
  $s->gender =$request->gender;
  }
  $s->nationality =$request->nationality;
  if($request->marital_status != ''){
  $s->marital_status =$request->marital_status;
  }
  $s->address =$request->address;
  if($request->birthdate != ''){
  $s->birthdate =$request->birthdate;
  }
  if($request->date_of_graduation != ''){
    $s->date_of_graduation =$request->date_of_graduation;
    }
    if($request->mode_of_entry != ''){
        $s->mode_of_entry =$request->mode_of_entry;
        }
  $s->parent =$request->parent;
  $s->save();
  Session::flash('success',"SUCCESSFULL.");
  return back();
 
}


//=================== update old students ===============

public function updateOldStudent(Request $request)
{
  
  
  $surname =strtoupper($request->surname);
  $firstname =strtoupper($request->firstname);
  $othernames =strtoupper($request->othernames);
  $matric_no=strtoupper($request->matric_no);

  if($request->state_of_origin != ''){
    $state =State::find($request->state_of_origin);
  $state_of_origin =$state->state_name;
  
  }
  if($request->localgovt_id != ''){
$state =Lga::find($request->localgovt_id);
  $local_gov =$state->lga_name;
  }
  
  if($request->std_custome18 != ''){
  $std_custome18 =$request->std_custome18;
  }
  if($request->gender != ''){
  $gender =$request->gender;
  }
  $nationality =$request->nationality;
  if($request->marital_status != ''){
  $marital_status =$request->marital_status;
  }
 
  if($request->birthdate != ''){
  $birthdate =$request->birthdate;
  }
  if($request->date_of_graduation != ''){
    $date_of_graduation =$request->date_of_graduation;
    }
    if($request->std_custome3 != ''){
        $std_custome3 =$request->std_custome3;
        }
  $parents_name =$request->parents_name;
  
  $s =DB::connection('oldporta')->table('students_profile')
    ->where('std_id',$request->std_id)
    ->update(['matric_no' => $matric_no,'surname'=>$surname,'firstname'=>$firstname,'othernames'=>$othernames,
    'gender'=>$gender,'marital_status'=>$marital_status,'birthdate'=>$birthdate,'local_gov'=>$local_gov,
    'state_of_origin'=>$state_of_origin,'nationality'=>$nationality,'parents_name'=>$parents_name,
    'std_custome3'=>$std_custome3,'std_custome18'=>$std_custome18,'date_of_graduation'=>$date_of_graduation]);
  Session::flash('success',"SUCCESSFULL.");
  return back();
 
}
//===============================================
public function deleteStudent($id,$yes =null)
{
    if($yes != 1)
    {
    session()->put('url',url()->previous());
      return view('confirmation');
    }
$s = Student::destroy($id);
 Session::flash('success',"SUCCESSFULL.");
 return redirect(session()->get('url'));
}

public function addSsce($id)
{
  $s=Student::find($id);
  $sb=Subject::get();
  $stype=SsceType::get();
  $st =State::orderBy('state_name','Asc')->get();
    return view('deskofficer.student.ssce',['s'=>$s,'st'=>$st,'sb'=>$sb,'stype'=>$stype]);
}

public function updateStudentSsce(Request $request)
{
    $variable =$request->input('subject_id');
    $grade =$request->input('grade');
    $student_id = $request->student_id;
    $ssce_type_id = $request->input('ssce_type_id');
 //dd($grade);
 $clean_list =array(); $data =array();
$s =Student::find($student_id);
$s->last_institution =$request->last_institution;
$s->save();

foreach ($variable as $key => $value) {
 if(!empty($grade[$key])){
  $clean_list[] =array('ssce_type_id'=>$ssce_type_id[$key],
    '$student_id'=>$student_id,'subject_id'=>$value);

$check =SsceGrade::where([['ssce_type_id',$ssce_type_id[$key]],['student_id',$student_id],
    ['subject_id',$value]])->first();
    if($check != null){
$check->grade = strtoupper($grade[$key]);
$check->Save();
    }else{
$data[] =array('ssce_type_id'=>$ssce_type_id[$key],'student_id'=>$student_id,
'subject_id'=>$value,'grade'=>strtoupper($grade[$key]));   
    }
}
 }
 //dd($data);
 if(count($data) != 0)
 {

DB::table('ssce_grades')->insert($data);
Session::flash('success',"SUCCESSFULL.");

}else{
    Session::flash('success',"grade updated success.");
}
return back();

}

//============register courses=====
public function registerCourses()
{
    $ap =AssignProgramme::where('user_id',Auth::id())->get();
    $f =Faculty::get();// for super admin
    $s =Semester::get();// for super admin
    return view('deskofficer.registercourse.index',['ap'=>$ap,'f'=>$f,'s'=>$s]);
}

public function postregisterCourses(Request $request)
{$id =$request->programme_id;
    $ap =AssignProgramme::where('user_id',Auth::id())->get();
    $f =Faculty::get();// for super admin
    $s =Semester::get();// for super admin
    $p =Programme::find($id);
    $semester =Semester::find($request->semester_id);
    $c =Course::where([['category_id',$p->category_id],['semester_id',$request->semester_id]])->get();
    return view('deskofficer.registercourse.index',['ap'=>$ap,'f'=>$f,'s'=>$s,'c'=>$c,'id'=>$id,'p'=>$p,
    'semester'=>$semester]);
}

public function RegisteredCourses(Request $request)
{
	$session =$request->input('session_id');
    $level =$request->input('level_id');
    $period =$request->input('period');
    $p =$request->input('programme_id');
    
    $variable = $request->input('id');
	if($variable == null)
{
    return back();
}

$id =$request->programme_id;
$p =Programme::find($id);
$d =$p->department_id;
$dd =Department::find($d);
$f =$dd->faculty_id;
$c =$p->category_id;
$course =Course::whereIn('id',$variable)->get();
foreach ($course as $key => $value) {
$data[$value->id] =['course_id'=>$value->id,'programme_id'=>$id,'department_id'=>$d,'faculty_id'=>$f,'category_id'=>$c,'level_id'=>$level,'semester_id'=>$value->semester,'title'=>$value->title,'code'=>$value->code,'unit'=>$value->unit,'session'=>$session,'semester_id'=>$value->semester_id,'period'=>$period];
$check_data[] =$value->id;
}
// check if course exist already on the register course table
$check =RegisterCourse::whereIn('course_id',$check_data)
->where([['programme_id',$id],['department_id',$d],['faculty_id',$f],['category_id',$c],['session',$session]
,['period',$period],['level_id',$level]])
->get();
if(count($check) > 0)
{
  foreach ($check as $key => $value) {

    unset($data[$value->course_id]);
}
}

DB::table('register_courses')->insert($data);
Session::flash('success',"SUCCESSFULL.");
return redirect()->action('DeskofficerController@registerCourses');
}

//============view register courses=====
public function viewRegisterCourses(Request $request)
{
    $ap =AssignProgramme::where('user_id',Auth::id())->get();
    $f =Faculty::get();// for super admin
    $s =Semester::get();// for super admin
    if($request->isMethod('post')){
        $l =$request->level_id;
        $p =Programme::find($request->programme_id);
        $y =$request->session_id;
        $next =$y + 1;
    $rc =RegisterCourse::where([['level_id',$l],
   ['programme_id',$request->programme_id],['session',$y]])->get();
    
    return view('deskofficer.registercourse.view',['ap'=>$ap,'f'=>$f,'s'=>$s,'rc'=>$rc,'l'=>$l,
    'p'=>$p,'y'=>$y,'next'=>$next]);
    }else{
        return view('deskofficer.registercourse.view',['ap'=>$ap,'f'=>$f,'s'=>$s]);
    }
   
}
public function deleteRegisterCourse($id,$yes =null)
{
    if($yes != 1)
    {
    session()->put('url',url()->previous());
      return view('confirmation');
    }
$s = RegisterCourse::destroy($id);
 Session::flash('success',"SUCCESSFULL.");
 return redirect(session()->get('url'));
}

//---------------------------Edit Courses ---------------------------------------------------

public function editRegisterCourse($id)
{
$c = RegisterCourse::find($id);
return view('deskofficer.registercourse.edit',['c'=>$c]);
}

public function updateRegisterCourse(Request $request)
{

$c = RegisterCourse::find($request->id);

$c->title =strtoupper($request->title);

$c->unit =$request->unit;

$c->save();
Session::flash('success',"SUCCESSFULL.");
return back();
}

public function getRegisteredStudents(Request $request)
{
 $ap =AssignProgramme::where('user_id',Auth::id())->get();
 
 if($request->isMethod('post')){
    $p =Programme::find($request->programme_id);
    $level = $request->level_id;
    $session =$request->session;
    $period =$request->period;
    $next_sesion =$session + 1;
    $s = DB::table('registered_students')
    ->join('students', 'students.id', '=', 'registered_students.student_id')
    ->where([['registered_students.programme_id',$request->programme_id],
    ['registered_students.session',$session],['registered_students.level_id',$level],
    ['registered_students.period',$period]])->get();
   return view('deskofficer.result.getregisteredStudents',['ap'=>$ap,'s'=>$s,'level'=>$request->level_id,
    'session'=>$session,'period'=>$period,
    'next_session'=>$next_sesion,'p'=>$p]); 
}else{
        return view('deskofficer.result.getRegisteredStudents',['ap'=>$ap]);
    }
  
}

public function resultDetails(Request $request,$id,$level,$session,$period)
{
$s=Student::find($id);
$rc =RegisterCourse::where([['level_id',$level],['session',$session],['programme_id',$s->programme_id],['period',$period]])
->orderBy('code','ASC')->orderBy('semester_id','ASC')->get();


return view('deskofficer.result.resultDetails',['rc'=>$rc,'s'=>$s,'l'=>$level,'session'=>$session,'period'=>$period]);
}

public function delete_multiple_grade(Request $request)
{
    
     $variable = $request->input('id');
     if($variable == null)
{
    Session::flash('danger',"You need select a row to select.");
    return back();
}

$result = Result::destroy($variable);
 Session::flash('success',"SUCCESSFULL.");
   return back();
}

public function getStudents(Request $request)
{
 $ap =AssignProgramme::where('user_id',Auth::id())->get();
 
 if($request->isMethod('post')){
    $p =Programme::find($request->programme_id);
    $next = $request->entry_year + 1;
    $next_sesion =$request->session;
    $s=Student::where([['programme_id',$request->programme_id],['entry_year',$request->entry_year]])->get();
    return view('deskofficer.result.getStudents',['ap'=>$ap,'s'=>$s,'level'=>$request->level_id,
    'session'=>$request->session,'period'=>$request->period,'token'=>$request->_token,
    'next'=>$next,'n_session'=>$next_sesion,'p'=>$p,'y'=>$request->entry_year]); 
}else{
        return view('deskofficer.result.getStudents',['ap'=>$ap]);
    }
  
}

public function enterResult(Request $request,$id,$level,$session,$period,$token)
{
$s=Student::find($id);
$rc =RegisterCourse::where([['level_id',$level],['session',$session],['programme_id',$s->programme_id],['period',$period]])
->orderBy('code','ASC')->orderBy('semester_id','ASC')->get();

return view('deskofficer.result.enterResult',['rc'=>$rc,'s'=>$s,'l'=>$level,'session'=>$session,'period'=>$period]);
}

public function insertResult(Request $request)
{
	$session =$request->input('session');
    $level =$request->input('level_id');
    $period =$request->input('period');
    $programme =$request->input('programme_id');
    $student_id =$request->input('student_id');
    $user_id =Auth::id();
    $matricNumber =$request->input('matricNumber');
    $semester_id =$request->input('semester_id');
    $unit =$request->input('unit');
    $registercourse_id =$request->input('registercourse_id');
    $grade =$request->input('grade');
    $variable = $request->input('course_id');
    //dd($student_id);
    session()->put('url',url()->previous());
foreach ($variable as $key => $value) {
    if(!empty($grade[$key])) {
        $cc =$value;

    $clean_list[$cc] =array('semester_id'=>$semester_id[$key],'registercourse_id'=>$registercourse_id[$key],'unit'=>$unit[$key],'course_id'=>$cc,'grade'=>strtoupper($grade[$key]));

    }
    }
    
if(empty($clean_list))
{
Session::flash('warning',"No grade entered");
return back();
}
$data =array();
//insert code
foreach($clean_list as $k=>$v ){
    //
    //check result table
    $check =Result::where([['course_id',$clean_list[$k]['course_id']],['level_id',$level],
    ['period',$period],['session',$session],['student_id',$student_id]])->first();
    if($check != null)
    {
$check->grade = $clean_list[$k]['grade'];
$check->user_id = $user_id;
$check->save();
    }else{
    $data[] =['semester_id' => $clean_list[$k]['semester_id'],'registercourse_id' =>$clean_list[$k]['registercourse_id'], 'course_id' =>$clean_list[$k]['course_id'],'unit'=>$clean_list[$k]['unit'],'grade'=>$clean_list[$k]['grade'],'user_id'=>$user_id,
    'student_id'=>$student_id,'programme_id'=>$programme,'matricNumber'=>$matricNumber,'level_id'=>$level,'period'=>$period,'session'=>$session];
    }
    }

    if(count($data) != 0){ 
    // check if you have registered for the session and period
    $checkRegisterdStudent =RegisteredStudent::where([['level_id',$level],
    ['period',$period],['session',$session],['student_id',$student_id]])->first();
  
    if( $checkRegisterdStudent ==null)
    {
     $rs =new RegisteredStudent;
     $rs->student_id =$student_id;
     $rs->session =$session;
     $rs->programme_id =$programme;
     $rs->level_id=$level;
     $rs->period =$period;
     $rs->save();

    }
DB::table('results')->insert($data);
Session::flash('success',"SUCCESSFULL.");
    }
return redirect(session()->get('url'));
}


public function transcript()
{
return view('deskofficer.transcript.index');
}


public function getTranscript(Request $request)
{
  $date =Date('Y/m/d');
   $matricNumber =$request->matricNumber;
   $tgp =0; $tu=0; $barcodeId =0;
   $issuing =IssuingOfficer::first();
   $role = DB::table('roles')
    ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
    ->where('user_roles.user_id',Auth::user()->id)
    ->first();
    $address ='';
    $alltranscrip =Alltranscript::where('matricno',$matricNumber)
    ->first();

   
  if($role->name =='TO' && Auth::user()->transcript_right !=null){
       $bar = new  BarcodeLog;
       $bar->matricNumber =$matricNumber;
       $bar->save();
      $bar_detail = new  BarcodeLogDetail;
       $bar_detail->barcode='UNICAL/DVC(A)/DB/'.Auth::user()->transcript_right.'/'.$date.'/'.$bar->id;
       $bar_detail->barcode_id =$bar->id;
       $bar_detail->address =$request->address;
       $bar_detail->save();
       $barcodeId =$bar_detail->barcode;
       $address =$bar_detail->address;

  //dd($barcodeId);
   $code = DNS2D::getBarcodeHTML($barcodeId, "QRCODE",3,3,"green", true);

   // check payment status
   
   if($alltranscrip == null)
   {
   Session::flash('warning',"Students records does not exist on payment log.");
       return back();
   }
  }else{
      $code ='THESE TRANSCRIPT IS A DRAFT COPY';
      $barcodeId =$date.'/'.Auth::user()->name;
  }
  
   $s =Student::where('matricNumber',$matricNumber)->first();
   
   if($s !=  null){
    
    //$ssce_grade =SsceGrade::where('student_id',$s->id)->get()->groupBy('ssce_type_id');
    $ssce_grade = Null;
    
    $p =Programme::find($s->programme_id);
   $rs =RegisteredStudent::where([['student_id',$s->id],['period','NORMAL']])->orderBy('session','DESC')->first();
   if($rs == null)
   {
     Session::flash('warning',"Students does not have result.");
      return back();
   }
   // check if the students programme is assign to the deskofficer
   $result = DB::table('results')
  ->join('register_courses', 'register_courses.id', '=', 'results.registercourse_id')
  ->where([['student_id',$s->id],['register_courses.programme_id',$s->programme_id]])
  ->select('results.session','grade','title','code','register_courses.unit','results.level_id','results.period','results.semester_id')
  ->orderBy('results.session','ASC')
  ->orderBy('results.semester_id','ASC')
  ->orderBy('code','ASC')
  ->distinct('code')->get()->groupBy('session');
  
  $no =$result->count();

  // get vacation result

   $result_vacation = DB::table('results')
  ->join('register_courses', 'register_courses.id', '=', 'results.registercourse_id')
  ->where([['student_id',$s->id],['register_courses.programme_id',$s->programme_id],['results.period','VACATION']])
  ->select('results.session','grade','title','code','register_courses.unit','results.level_id','results.semester_id')
  ->orderBy('results.session','ASC')
  ->orderBy('results.semester_id','ASC')
  ->orderBy('code','ASC')
  ->distinct('code')->get()->groupBy('session');
  
  $next =$s->entry_year + 1;
  
// medice students
  if($s->faculty_id == 22 || $s->faculty_id == 1 )
//dd($result);
{
    $data = ['student'=>$s,'next'=>$next,'rs'=>$rs,'result'=>$result,
    'issuing'=>$issuing,'p'=>$p,'ssce'=>$ssce_grade,'no'=>$no,'code'=>$code,'barcodeId'=>$barcodeId,
    'address'=>$address,'alltranscrip'=>$alltranscrip];
  
    $pdf = PDF::loadview('deskofficer.transcript.transcript_medical',$data);
    return $pdf->setPaper('a4', 'landscape')->stream('transcript_medical.pdf'); 
}

$next2 =$rs->session +1;
  //cgpa
 
  foreach($result as $items)
  {

      foreach($items as $value)
      {
        $gp = $this->gradePoint($value->grade,$value->unit,$s->entry_year);
    
        $tgp += $gp;
        $tu +=$value->unit;
      }
  }
  @$cgpa = $tgp / $tu ;
  $cgpa = number_format ($cgpa,2); 
  
  $c_degree =$this->getClassDegree($cgpa,$s->entry_year);
  
  
  //$data = ['v'=>$value,'ld'=>$ld,'m'=>$m,'fa'=>$fa,'rs'=>$rs,'af'=>$af,'u'=>$user,'ad'=>$ApproverDetail];
  $data = ['student'=>$s,'next'=>$next,'rs'=>$rs,'next2'=>$next2,'result'=>$result,
  'issuing'=>$issuing,'c_gpa'=>$cgpa,'c_degree'=>$c_degree,'p'=>$p,'ssce'=>$ssce_grade,'no'=>$no,'code'=>$code,
  'barcodeId'=>$barcodeId,'address'=>$address,'alltranscrip'=>$alltranscrip,'vacation'=>$result_vacation];

  $pdf = PDF::loadview('deskofficer.transcript.transcript',$data);
    return $pdf->setPaper('a4', 'landscape')->stream('transcript.pdf');
}else{
    $s =DB::connection('oldporta')->table('students_profile')
    ->where('matric_no',$matricNumber)->first();
    
    if($s != null){
    $rs =DB::connection('oldporta')->table('students_reg')
    ->where([['std_id',$s->std_id],['season','NORMAL'],['semester','First Semester']])
    ->orderBy('yearsession','DESC')->first();
    
   
    $result = DB::connection('oldporta')->table('students_results')
    ->join('courses', 'courses.thecourse_id', '=', 'students_results.stdcourse_id')
    ->where('std_id',$s->std_id)
    ->select('students_results.std_mark_custom2','std_grade','thecourse_title','thecourse_code','courses.thecourse_unit','students_results.period','students_results.level_id','students_results.std_mark_custom1')
    ->orderBy('students_results.std_mark_custom2','ASC')
    ->orderBy('students_results.std_mark_custom1','ASC')
    ->orderBy('thecourse_code','ASC')
   ->distinct()->get()->groupBy('std_mark_custom2');
   $no =$result->count();

   $result_vacation = DB::connection('oldporta')->table('students_results')
    ->join('courses', 'courses.thecourse_id', '=', 'students_results.stdcourse_id')
    ->where([['std_id',$s->std_id],['students_results.period','VACATION']])
    ->select('students_results.std_mark_custom2','std_grade','thecourse_title','thecourse_code','courses.thecourse_unit','students_results.period','students_results.level_id','students_results.std_mark_custom1')
    ->orderBy('students_results.std_mark_custom2','ASC')
    ->orderBy('students_results.std_mark_custom1','ASC')
    ->orderBy('thecourse_code','ASC')
   ->distinct()->get()->groupBy('std_mark_custom2');

    $f =DB::connection('oldporta')->table('faculties')->where('faculties_id',$s->stdfaculty_id)->first();
    $d =DB::connection('oldporta')->table('departments')->where('departments_id',$s->stddepartment_id)->first();
    $fos =DB::connection('oldporta')->table('dept_options')->where('do_id',$s->stdcourse)->first();
    if($no == 0){
        Session::flash('warning',"Result does not exist.");
        return back();
    }
    foreach($result as $items)
    {
  
        foreach($items as $value)
        {
          $gp = $this->gradePoint($value->std_grade,$value->thecourse_unit,$s->std_custome18);
          $tgp += $gp;
          $tu +=$value->thecourse_unit;
        
        }
    }
    @$cgpa = $tgp / $tu ;
    $cgpa = number_format ($cgpa,2); 
    
    $c_degree =$this->getClassDegree($cgpa,$s->std_custome18);
    $degree =$this->getDegree($s->stddegree_id);
    $next =$s->std_custome18 + 1;
    $next2 =$rs->yearsession +1;

    $data = ['student'=>$s,'next'=>$next,'result'=>$result,'rs'=>$rs,'next2'=>$next2,
    'issuing'=>$issuing,'c_gpa'=>$cgpa,'c_degree'=>$c_degree,'d'=>$d,'f'=>$f,
    'degree'=>$degree,'fos'=>$fos,'no'=>$no,'code'=>$code,'barcodeId'=>$barcodeId,
    'address'=>$address,'alltranscrip'=>$alltranscrip,'vacation'=>$result_vacation];
  
    $pdf = PDF::loadview('deskofficer.transcript.result_transcript',$data);
    return $pdf->setPaper('a4', 'landscape')->stream('result_transcript.pdf');

}
    
}
Session::flash('warning',"Matric Number does not exist.");
           return back();
  
              
}

public function gradePoint( $G, $U,$entry_year=null) {

    $return = array();
     if($entry_year <= '1988')
    {
        switch( $G ) {
            case 'A':
                $return  = 4 * $U;
                break;
            case 'A-':
                $return  = 3.75* $U;
                break;
            case 'B+':
                 $return  = 3.50 * $U;
                break;
            case 'B':
                $return = 3.00 * $U;
                break;
            case 'B-':
                $return = 2.75 * $U;
                break;
            case 'C+':
                
                $return = 2.50 * $U;
                
                break;
            case 'C':
                $return = 2.00 * $U;
                break;
            case 'C-':
                $return  = 1.75 * $U;
                break;
            case 'D':
                $return  = 1.50 * $U;
                 break;
             case 'E':
                $return  = 1.25 * $U;
                    break;
            case 'F':
                $return  = 0 * $U;
                break;
    
                case 'N':
                    $return = 0 * $U;
                    break;
                }

    }elseif ($entry_year >= '1989' && $entry_year <= '1990') {
       switch( $G ) {
        case 'A':
            $return = 5 * $U;
            break;
        case 'B+':
            $return = 4 * $U;
            break;
        case 'B':
            $return = 3.5 * $U;
            break;
        case 'C':
            $return = 3 * $U;
            break;
        case 'D':
            $return = 2.5 * $U;
            break;

        case 'F':
            $return = 0 * $U;
            break;
            case 'N':
                $return =0;
                break;
    }
    }
    else{
   
   
    switch( $G ) {
        case 'A':
            $return = 5 * $U;
            break;
        case 'B':
            $return = 4 * $U;
            break;
        case 'C':
            $return = 3 * $U;
            break;
        case 'D':
            $return = 2 * $U;
            break;
        case 'E':
            $return = 1 * $U;
            break;
        case 'F':
            $return = 0 * $U;
            break;
            case 'N':
                $return =0;
                break;
    }
  }
  
    return $return;
}

private function getClassDegree( $cpga, $year, $ignore = false ) 
{
  
  if( $ignore )
    return '';
    if($year <= '1988')
    {
        switch( $cpga ){
        case $cpga <= 1.74 && $cpga >= 0.00 :
            return 'PASS';
        break;
        case $cpga <= 1.99 && $cpga >= 1.75 :
            return 'PASS';
        break;
        case $cpga <= 2.49 && $cpga >= 2.00 :
            return 'THIRD CLASS';
        break;
        case $cpga <= 2.99 && $cpga >= 2.50 :
            return 'SECOND CLASS LOWER';
        break;
        case $cpga <= 3.49 && $cpga >= 3.00 :
            return 'SECOND CLASS UPPER';
        break;
        case $cpga >= 3.50 :
            return 'FIRST CLASS';
        break;
        default:
            return '---';
        break;
    }
}

       elseif($year >= '1989' && $year <= '1990')
    {
        switch( $cpga ){
        case $cpga <= 2.49 && $cpga >= 0.00 :
            return 'FaIl';
        break;
        case $cpga <= 2.78 && $cpga >= 2.5 :
            return 'PASS';
        break;
        case $cpga <= 3.24 && $cpga >= 2.77 :
            return 'THIRD CLASS';
        break;
        case $cpga <= 3.99 && $cpga >= 3.25 :
            return 'SECOND CLASS LOWER';
        break;
        case $cpga <= 4.49 && $cpga >= 4.00 :
            return 'SECOND CLASS UPPER';
        break;
        case $cpga >= 4.50 :
            return 'FIRST CLASS';
        break;
        default:
            return '---';
        break;
    }

    }else{

    
  switch( $cpga ){
    case $cpga <= 1.49 && $cpga >= 1.00 :
      return 'PASS';
    break;
    case $cpga <= 2.39 && $cpga >= 1.50 :
      return 'THIRD CLASS';
    break;
    case $cpga <= 3.49 && $cpga >= 2.40 :
      return 'SECOND CLASS LOWER';
    break;
    case $cpga <= 4.49 && $cpga >= 3.50 :
      return 'SECOND CLASS UPPER';
    break;
    case $cpga <= 5.00 && $cpga >= 4.50:
      return 'FIRST CLASS';
    break;
    default:
      return '---';
    break;
  }
}
  
}
/*private function getClassDegree( $cpga, $ignore = false ) 
{
	
	if( $ignore )
		return '';
		
	switch( $cpga ){
		case $cpga <= 1.49 && $cpga >= 1.00 :
			return 'PASS';
		break;
		case $cpga <= 2.39 && $cpga >= 1.50 :
			return 'THIRD CLASS';
		break;
		case $cpga <= 3.49 && $cpga >= 2.40 :
			return 'SECOND CLASS LOWER';
		break;
		case $cpga <= 4.49 && $cpga >= 3.50 :
			return 'SECOND CLASS UPPER';
		break;
		case $cpga <= 5.00 && $cpga >= 4.50:
			return 'FIRST CLASS';
		break;
		default:
			return '---';
		break;
	}
	
}*/
private function getDegree( $stddegree_id ) {
    $str = DB::connection('oldporta')->table("degree")
    ->Where('degree_id',$stddegree_id)->first();
	return strtoupper($str->degree_name);
}

public function updatedResult()
{
  $rg =RegisterCourse::get();
  //$r=Result::Where('registercourse_id','=',null)->get();
 
  foreach ($rg as $key => $value) {
    set_time_limit(0);
    $r=Result::Where([['course_id',$value->course_id],['programme_id',$value->programme_id],
      ['session',$value->session],['level_id',$value->level_id],['semester_id',$value->semester_id]
      ,['period',$value->period],['registercourse_id','=',null]])->first();


    if($r != null){
    $r->registercourse_id =$value->id;
    $r->save();
  }


  }
  dd('success');
}
}

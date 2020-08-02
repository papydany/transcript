<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarcodeLog;
use App\BarcodeLogDetail;
use App\IssuingOfficer;
use App\VC;
use App\Registrar;
use App\Student;
use App\State;
use App\Programme;
use App\RegisterCourse;
use App\Result;
use Milon\Barcode\DNS2D;
use PDF;
use Session;
use DB;

class TranscriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destinationAddress()
    {
        return view('transcript.destinationAddress');
    }

    public function post_destinationAddress(Request $request)
    {
        $transcript_id=$request->transcript_id;
        $b =BarcodeLogDetail::where('barcode',$transcript_id)->first();
        if($b == null){
            $request->session()->flash('warning', 'Please check your transcript ID!');
            return back();
        }
        $b->address =$request->address;
        $b->save();
        $request->session()->flash('success', 'successfull');
        return back();
    }

    public function getCoverLetter(Request $request)
    {
        return view('transcript.coverletter');
    }
    public function post_CoverLetter(Request $request)
    {
        $transcript_id=$request->transcript_id;
        $b =BarcodeLogDetail::where('barcode',$transcript_id)->first();
        
        if($b == null){
            $request->session()->flash('warning', 'Please check your transcript ID!');

            return back();
        }
        $date =Date('Y/m/d');
    $vc =VC::first();
    $r=Registrar::first();
    $blog =barcodelog::find($b->barcode_id);
    $s =Student::where('matricNumber',$blog->matricNumber)->first();
   
   
    $issuing =IssuingOfficer::first();
    $code = DNS2D::getBarcodeHTML($transcript_id, "QRCODE",3,3,"green", true);
   
    if($s !=  null){
        $p =Programme::find($s->programme_id);
    $result = DB::table('results')
    ->join('register_courses', 'register_courses.course_id', '=', 'results.course_id')
    ->where([['student_id',$s->id],['register_courses.programme_id',$s->programme_id]])
    ->select('results.session','grade','title','code','register_courses.unit','results.level_id','results.semester_id')
    ->orderBy('results.session','ASC')
    ->orderBy('results.semester_id','ASC')
    ->orderBy('code','ASC')
    ->distinct()->get()->groupBy('session','level_id');
    $data =['transcript_id'=>$transcript_id,'vc'=>$vc,'r'=>$r,'student'=>$s,'date'=>$date,
    'b'=>$b,'issuing'=>$issuing,'result'=>$result,'code'=>$code];
    $pdf = PDF::loadview('transcript.maincoverletter',$data);
    return $pdf->setPaper('a4')->stream('maincoverletter.pdf');
}else{
    $s =DB::connection('oldporta')->table('students_profile')
    ->where('matric_no',$blog->matricNumber)->first();
    if($s != null){
    $f =DB::connection('oldporta')->table('faculties')->where('faculties_id',$s->stdfaculty_id)->first();
    $d =DB::connection('oldporta')->table('departments')->where('departments_id',$s->stddepartment_id)->first();
    $fos =DB::connection('oldporta')->table('dept_options')->where('do_id',$s->stdcourse)->first();
       
    $result = DB::connection('oldporta')->table('students_results')
    ->join('courses', 'courses.thecourse_id', '=', 'students_results.stdcourse_id')
    ->where('std_id',$s->std_id)
    ->select('students_results.std_mark_custom2','std_grade','thecourse_title','thecourse_code','students_results.cu','students_results.level_id','students_results.std_mark_custom1')
    ->orderBy('students_results.std_mark_custom2','ASC')
    ->orderBy('students_results.std_mark_custom1','ASC')
    ->orderBy('thecourse_code','ASC')
   ->distinct()->get()->groupBy('std_mark_custom2','level_id');
    }
    $data =['transcript_id'=>$transcript_id,'vc'=>$vc,'r'=>$r,'student'=>$s,'date'=>$date,
    'b'=>$b,'issuing'=>$issuing,'result'=>$result,'code'=>$code,'f'=>$f,'d'=>$d,'fos'=>$fos];
    $pdf = PDF::loadview('transcript.oldcoverletter',$data);
    return $pdf->setPaper('a4')->stream('oldcoverletter.pdf');
}
 }

 public function studentDetail(Request $request)
 {
    if($request->isMethod('post')){
        $matricNumber =$request->matricNumber;
        
        $student =Student::where('matricNumber',$matricNumber)->first();
        $st =State::get();
        
        if($student != null){
        return view('transcript.student.index',['s'=>$student,'st'=>$st]);
        }else{
            // check old portal
    $student =DB::connection('oldporta')->table('students_profile')
    ->where('matric_no',$matricNumber)->first();
    return view('transcript.student.index',['oldstudent'=>$student,'st'=>$st]);
        }
        $request->session()->flash('warning', 'Matric number does not exist');
    }
    return view('transcript.student.index');
 }

 public function courseTitle(Request $request,$matricNumber=null,$level=null)
 {
        $matricNumber =$request->matricNumber;
        $level =$request->level;   
       
if($matricNumber != null){
  
   $s =Student::where('matricNumber',$matricNumber)->first();
   
        if($s !=  null){
        $p =Programme::find($s->programme_id);
          $result = DB::table('results')
       ->join('register_courses', 'register_courses.id', '=', 'results.registercourse_id')
       ->where([['student_id',$s->id],['register_courses.programme_id',$s->programme_id],['register_courses.level_id',$level]])
       ->select('results.session','title','code','register_courses.unit','results.semester_id','register_courses.id')
       ->orderBy('results.session','ASC')
       ->orderBy('results.semester_id','ASC')
       ->orderBy('code','ASC')
       ->distinct('code')->get();
       
       return view('transcript.student.courseTitle',['s'=>$s,'result'=>$result]);
     }else{
         $s =DB::connection('oldporta')->table('students_profile')
         ->where('matric_no',$matricNumber)->first();
         
         if($s != null){
         $rs =DB::connection('oldporta')->table('students_reg')
         ->where([['std_id',$s->std_id],['season','NORMAL'],['semester','First Semester']])
         ->orderBy('yearsession','DESC')->first();
         
        
         $result = DB::connection('oldporta')->table('students_results')
         ->join('courses', 'courses.thecourse_id', '=', 'students_results.stdcourse_id')
         ->where([['std_id',$s->std_id],['students_results.level_id',$level]])
         ->select('courses.semester','thecourse_title','thecourse_code','thecourse_unit','thecourse_id',
         'students_results.std_mark_custom2','students_results.std_mark_custom1')
         ->orderBy('students_results.std_mark_custom2','ASC')
         ->orderBy('students_results.std_mark_custom1','ASC')
         ->orderBy('thecourse_code','ASC')
        ->distinct()->get();
        $f =DB::connection('oldporta')->table('faculties')->where('faculties_id',$s->stdfaculty_id)->first();
        $d =DB::connection('oldporta')->table('departments')->where('departments_id',$s->stddepartment_id)->first();
         $fos =DB::connection('oldporta')->table('dept_options')->where('do_id',$s->stdcourse)->first();
        
         return view('transcript.student.courseTitle',['olds'=>$s,'old_result'=>$result]);
     
     }
         
     }
    }else{
        return view('transcript.student.courseTitle');
    }

 }
 public function updateOldCourseTitle(Request $request)
 {
$id =$request->id;
$matric_no =$request->matric_no;
$level =$request->level;
foreach($id as $v){
    if($request->title[$v] !=''){
     $s =DB::connection('oldporta')->table('courses')
    ->where('thecourse_id',$v)
    ->update(['thecourse_title' => $request->title[$v],'thecourse_unit'=>$request->unit[$v]]);
    }
}
return redirect()->action('TranscriptController@courseTitle',[$matric_no,$level]);
$request->session()->flash('success', 'successfull');
  
}

public function updateCourseTitle(Request $request)
{
$id =$request->id;
$matric_no =$request->matric_no;
$level =$request->level;
foreach($id as $v){
   if($request->title[$v] !=''){
    $s =RegisterCourse::where('id',$v)
   ->update(['title' => $request->title[$v],'unit'=>$request->unit[$v]]);
   }
}
$request->session()->flash('success', 'successfull');
return redirect()->action('TranscriptController@courseTitle',[$matric_no,$level]);
 
}

public function getresultDetail(Request $request,$matricNumber=null,$level=null,$period=null)
{
    $matricNumber =$request->matricNumber;
    $level =$request->level; 
    $period =$request->period; 
    if($matricNumber != null)
    {
        $s =Student::where('matricNumber',$matricNumber)->first();
        if($s !=  null){
        $p =Programme::find($s->programme_id);
  
            
        $rc =RegisterCourse::where([['level_id',$level],['programme_id',$s->programme_id],['period',$period]])
        ->orderBy('code','ASC')->orderBy('semester_id','ASC')->get();
        
        return view('transcript.student.getresultDetail',['rc'=>$rc,'s'=>$s,'l'=>$level,'period'=>$period]);
        }
    }else{
        return view('transcript.student.getresultDetail');
    }
    
}

public function delete_grade(Request $request)
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
}



<?php

namespace App;
use DB;

use Auth;
class General
{

 public function getrolename($id){
        $user = DB::table('roles')
            ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('user_roles.user_id',$id)
            ->first();
            return $user;
    }

    //================== get user ===============
 public function getuser($id){
    $user =User::find($id);
    return $user;
}
//  ===== get role ================
public function getrole($id)
{
$r =Role::find($id);
return $r;

}

public function getResult($level,$session,$programme,$period,$student_id,$course_id)
{
    $r =Result::where([['level_id',$level],['session',$session],
    ['programme_id',$programme],['period',$period],['student_id',$student_id,],
    ['course_id',$course_id]])->first();
    if($r != null)
    {
        return $r;
    }

    return '';
}

public function getSsceGrade($id,$sb,$stype)
{
    $r =SsceGrade::where([['student_id',$id],['subject_id',$sb],
    ['ssce_type_id',$stype]])->first();
    if($r != null)
    {
        return $r;
    }

    return '';
}
public function getSsceType($id)
{
    $r =SsceType::find($id);
    if($r != null)
    {
        return $r;
    }

    return '';
}
public function mm( $G, $U,$entry_year) {

    $return = array();
    if($entry_year <= '1988')
    {
        switch( $G ) {
            case 'A':
                $return['cp'] = 4 * $U;
                break;
            case 'A-':
                $return['cp'] = 3.75* $U;
                break;
            case 'B+':
                 $return['cp'] = 3.50 * $U;
                break;
            case 'B':
                $return['cp'] = 3.00 * $U;
                break;
            case 'B-':
                $return['cp'] = 2.75 * $U;
                break;
            case 'C+':
                $return['cp'] = 2.50* $U;
                break;
            case 'C':
                $return['cp'] = 2.00 * $U;
                break;
            case 'C-':
                $return['cp'] = 1.75 * $U;
                break;
            case 'D':
                $return['cp'] = 1.50 * $U;
                 break;
             case 'E':
                $return['cp'] = 1.25 * $U;
                    break;
            case 'F':
                $return['cp'] = 0 * $U;
                break;
    
                case 'N':
                    $return['cp'] = 0 * $U;
                    break;
                }

    }elseif ($entry_year >= '1989' && $entry_year <= '1990')
     {
           switch( $G ) {
        case 'A':
            $return['cp'] = 5 * $U;
            break;
        case 'B+':
            $return['cp'] = 4 * $U;
            break;
        case 'B':
            $return['cp'] = 3.5 * $U;
            break;
        case 'C':
            $return['cp'] = 3 * $U;
            break;
        case 'D':
            $return['cp'] = 2.5 * $U;
            break;
        case 'F':
            $return['cp'] = 0 * $U;
            break;

            case 'N':
                $return['cp'] = 0 * $U;
                break;
    } 
    }


    else{
   
    switch( $G ) {
        case 'A':
            $return['cp'] = 5 * $U;
            break;
        case 'B':
            $return['cp'] = 4 * $U;
            break;
        case 'C':
            $return['cp'] = 3 * $U;
            break;
        case 'D':
            $return['cp'] = 2 * $U;
            break;
        case 'E':
            $return['cp'] = 1 * $U;
            break;
        case 'F':
            $return['cp'] = 0 * $U;
            break;

            case 'N':
                $return['cp'] = 0 * $U;
                break;
    }
}
    return $return;
}

function G_degreed( $cpga) 
{
        
    switch( $cpga ){
        case $cpga <= 0.99 && $cpga >= 0.00:
        return 'FAIL';
        break;
         case $cpga <= 2.39 && $cpga >=1.00:
         return 'PASS';
        break;
        case $cpga <= 3.49 && $cpga >= 2.40 :
        
            return 'MERIT';
        break;
        case $cpga <= 4.49 && $cpga >= 3.50 :
            
            return 'CREDIT';
        break;
        case $cpga <= 5.00 && $cpga >= 4.50:
            return 'DISTINCTION';
        break;
        default:
            return '---';
        break;
    }
    
}
public function getClassDegree( $cpga, $year, $ignore = false ) 
{
	
	if( $ignore )
		return '';
    if($entry_year <= '1988')
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

       elseif($entry_year >= '1989' && $entry_year <= '1990')
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

public function registerOldStudent($id,$s)
{
    $rs =DB::connection('oldporta')->table('students_reg')
    ->where([['std_id',$id],['yearsession',$s],['semester','First Semester']])->first();
    return $rs;
}
public function registerBeginningStudent($id,$s)
{
$rs =RegisteredStudent::where([['student_id',$id],['session',$s]])->first();
return $rs;
  
}
public function getAssignProgrammeByuserId($id)
{
    $ap=AssignProgramme::where('user_id',$id)->get();
    return $ap;
}
}

?>
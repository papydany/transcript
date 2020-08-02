<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('clear', function() {
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('config:cache');
    $exitCode3 = Artisan::call('view:clear');
    $exitCode4 = Artisan::call('route:clear');
    //$exitCode2 = Artisan::call('config:clear');
    return '<h1>Cache facade value cleared</h1>';
});

Auth::routes();
Route::get('home_update', 'HomeController@home_update');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('getlga/{id}', 'GeneralController@getlga');
//issuing officer
Route::get('issuingOfficer', ['uses' =>'HomeController@issuingOfficer','middleware' => 'roles','roles'=>'sa'])->name('issuingOfficer');
Route::post('issuingOfficer', ['uses' =>'HomeController@post_issuingOfficer','middleware' => 'roles','roles'=>'sa'])->name('issuingOfficer');

//vc
Route::get('vc', ['uses' =>'HomeController@vc','middleware' => 'roles','roles'=>'sa'])->name('vc');
Route::post('vc', ['uses' =>'HomeController@post_vc','middleware' => 'roles','roles'=>'sa'])->name('vc');

//registrar
Route::get('registrar', ['uses' =>'HomeController@registrar','middleware' => 'roles','roles'=>'sa'])->name('registrar');
Route::post('registrar', ['uses' =>'HomeController@post_registrar','middleware' => 'roles','roles'=>'sa'])->name('registrar');

//desk officer
Route::get('createDeskofficer', ['uses' =>'HomeController@createDeskofficer','middleware' => 'roles','roles'=>'sa'])->name('createDeskofficer');
Route::post('createDeskofficer', ['uses' =>'HomeController@post_createDeskofficer','middleware' => 'roles','roles'=>'sa'])->name('createDeskofficer');
Route::get('viewDeskofficer', ['uses' =>'HomeController@viewDeskofficer','middleware' => 'roles','roles'=>'sa'])->name('viewDeskofficer');
Route::get('deactivatedAccount', ['uses' =>'HomeController@deactivatedAccount','middleware' => 'roles','roles'=>'sa'])->name('deactivatedAccount');

Route::get('deactivateAccount/{id}', ['uses' =>'HomeController@deactivateAccount','middleware' => 'roles','roles'=>'sa'])->name('deactivateAccount');
Route::get('activateAccount/{id}', ['uses' =>'HomeController@activateAccount','middleware' => 'roles','roles'=>'sa'])->name('activateAccount');

// faculty
Route::get('faculty', ['uses' =>'HomeController@faculty','middleware' => 'roles','roles'=>'sa'])->name('faculty');
Route::post('faculty', ['uses' =>'HomeController@postfaculty','middleware' => 'roles','roles'=>'sa'])->name('postfaculty');
Route::get('editFaculty/{id}', ['uses' =>'HomeController@editFaculty','middleware' => 'roles','roles'=>'sa'])->name('editFaculty');
Route::post('updateFaculty', ['uses' =>'HomeController@updateFaculty','middleware' => 'roles','roles'=>'sa'])->name('updateFaculty');

// department
Route::get('department', ['uses' =>'HomeController@department','middleware' => 'roles','roles'=>'sa'])->name('department');
Route::post('department', ['uses' =>'HomeController@postdepartment','middleware' => 'roles','roles'=>'sa'])->name('postdepartment');
Route::get('editDepartment/{id}', ['uses' =>'HomeController@editDepartment','middleware' => 'roles','roles'=>'sa'])->name('editDepartment');
Route::post('updateDepartment', ['uses' =>'HomeController@updateDepartment','middleware' => 'roles','roles'=>'sa'])->name('updateDepartment');
//courses
Route::get('courses', ['uses' =>'HomeController@course','middleware' => 'roles','roles'=>'sa'])->name('courses');
Route::post('courses', ['uses' =>'HomeController@postcourse','middleware' => 'roles','roles'=>'sa'])->name('courses');
Route::get('viewCourses', ['uses' =>'HomeController@viewCourses','middleware' => 'roles','roles'=>'sa'])->name('viewCourses');
Route::post('viewCourses', ['uses' =>'HomeController@postviewCourses','middleware' => 'roles','roles'=>'sa'])->name('viewCourses');
Route::get('editCourse/{id}', ['uses' =>'HomeController@editCourse','middleware' => 'roles','roles'=>'sa'])->name('editCourse');
Route::post('updateCourse', ['uses' =>'HomeController@updateCourse','middleware' => 'roles','roles'=>'sa'])->name('updateCourse');
//subject
Route::get('subjects', ['uses' =>'HomeController@subject','middleware' => 'roles','roles'=>'sa'])->name('subjects');
Route::post('subjects', ['uses' =>'HomeController@postSubject','middleware' => 'roles','roles'=>'sa'])->name('subjects');
Route::get('viewSubjects', ['uses' =>'HomeController@viewSubjects','middleware' => 'roles','roles'=>'sa'])->name('viewSubjects');
Route::get('editSubject/{id}', ['uses' =>'HomeController@editSubject','middleware' => 'roles','roles'=>'sa'])->name('editSubject');
Route::post('updateSubject', ['uses' =>'HomeController@updateSubject','middleware' => 'roles','roles'=>'sa'])->name('updateSubject');

//programme
Route::get('programmes', ['uses' =>'HomeController@programme','middleware' => 'roles','roles'=>'sa'])->name('programmes');
Route::post('programmes', ['uses' =>'HomeController@postprogramme','middleware' => 'roles','roles'=>'sa'])->name('programmes');
Route::get('viewProgrammes', ['uses' =>'HomeController@viewProgrammes','middleware' => 'roles','roles'=>'sa'])->name('viewProgrammes');
Route::post('viewProgrammes', ['uses' =>'HomeController@postviewProgrammes','middleware' => 'roles','roles'=>'sa'])->name('viewProgrammes');
Route::get('editProgramme/{id}', ['uses' =>'HomeController@editProgramme','middleware' => 'roles','roles'=>'sa'])->name('editProgramme');
Route::post('updateProgramme', ['uses' =>'HomeController@updateProgramme','middleware' => 'roles','roles'=>'sa'])->name('updateProgramme');
Route::get('programme/{id}', 'HomeController@getprogrammebydepartment');
Route::get('department/{id}', 'HomeController@getdepartmentbyfaculty');

//specialization
Route::get('specializations', ['uses' =>'HomeController@specialization','middleware' => 'roles','roles'=>'sa'])->name('specializations');
Route::post('specializations', ['uses' =>'HomeController@postspecialization','middleware' => 'roles','roles'=>'sa'])->name('specializations');
Route::get('viewSpecializations', ['uses' =>'HomeController@viewSpecializations','middleware' => 'roles','roles'=>'sa'])->name('viewSpecializations');
Route::post('viewSpecializations', ['uses' =>'HomeController@postviewSpecializations','middleware' => 'roles','roles'=>'sa'])->name('viewSpecializations');
Route::get('editSpecialization/{id}', ['uses' =>'HomeController@editSpecialization','middleware' => 'roles','roles'=>'sa'])->name('editSpecialization');
Route::post('updateSpecialization', ['uses' =>'HomeController@updateSpecialization','middleware' => 'roles','roles'=>'sa'])->name('updateSpecialization');

Route::get('assignProgrammes', ['uses' =>'HomeController@assignProgrammes','middleware' => 'roles','roles'=>'sa'])->name('assignProgrammes');
Route::post('assignProgrammes', ['uses' =>'HomeController@postAssignProgrammes','middleware' => 'roles','roles'=>'sa'])->name('assignProgrammes');
Route::post('assignProgrammesToOfiicer', ['uses' =>'HomeController@assignProgrammesToOfiicer','middleware' => 'roles','roles'=>'sa'])->name('assignProgrammesToOfiicer');

Route::get('viewAssignProgrammes', ['uses' =>'HomeController@viewAssignProgrammes','middleware' => 'roles','roles'=>'sa'])->name('viewAssignProgrammes');
Route::post('viewAssignProgrammes', ['uses' =>'HomeController@postviewAssignProgrammes','middleware' => 'roles','roles'=>'sa'])->name('viewAssignProgrammes');
//Route::get('editSpecialization/{id}', ['uses' =>'HomeController@editSpecialization','middleware' => 'roles','roles'=>'sa'])->name('editSpecialization');
//Route::post('updateSpecialization', ['uses' =>'HomeController@updateSpecialization','middleware' => 'roles','roles'=>'sa'])->name('updateSpecialization');

//========================desk officer route========================
Route::get('students', ['uses' =>'DeskofficerController@index','middleware' => 'roles','roles'=>['sa','do']])->name('students');
Route::post('students', ['uses' =>'DeskofficerController@students','middleware' => 'roles','roles'=>['sa','do']])->name('students');
Route::get('viewStudents', ['uses' =>'DeskofficerController@viewStudents','middleware' => 'roles','roles'=>['sa','do','to']])->name('viewStudents');
Route::post('viewStudents', ['uses' =>'DeskofficerController@viewStudents','middleware' => 'roles','roles'=>['sa','do','to']])->name('viewStudents');
Route::get('editStudent/{id}', ['uses' =>'DeskofficerController@editStudent','middleware' => 'roles','roles'=>['sa','do','to']])->name('editStudent');
Route::post('updateStudent', ['uses' =>'DeskofficerController@updateStudent','middleware' => 'roles','roles'=>['sa','do','to']])->name('updateStudent');
Route::get('deleteStudent/{id}/{yes?}', ['uses' =>'DeskofficerController@deleteStudent','middleware' => 'roles','roles'=>['sa','do']]);
Route::get('addSsce/{id}', ['uses' =>'DeskofficerController@addSsce','middleware' => 'roles','roles'=>['sa','do']])->name('addSsce');
Route::post('updateStudentSsce', ['uses' =>'DeskofficerController@updateStudentSsce','middleware' => 'roles','roles'=>['sa','do']])->name('updateStudentSsce');
Route::get('studentDetail', ['uses' =>'TranscriptController@studentDetail','middleware' => 'roles','roles'=>['sa','do','TO']])->name('studentDetail');
Route::post('studentDetail', ['uses' =>'TranscriptController@studentDetail','middleware' => 'roles','roles'=>['sa','do','TO']])->name('studentDetail');
Route::post('updateOldStudent', ['uses' =>'DeskofficerController@updateOldStudent','middleware' => 'roles','roles'=>['sa','do','to']])->name('updateOldStudent');

//=========== register course
Route::get('registerCourses', ['uses' =>'DeskofficerController@registerCourses','middleware' => 'roles','roles'=>['sa','do']])->name('registerCourses');
Route::post('registerCourses', ['uses' =>'DeskofficerController@postregisterCourses','middleware' => 'roles','roles'=>['sa','do']])->name('registerCourses');
Route::post('RegisteredCourses', ['uses' =>'DeskofficerController@RegisteredCourses','middleware' => 'roles','roles'=>['sa','do']])->name('RegisteredCourses');

Route::get('viewRegisterCourses', ['uses' =>'DeskofficerController@viewRegisterCourses','middleware' => 'roles','roles'=>['sa','do']])->name('viewRegisterCourses');
Route::post('viewRegisterCourses', ['uses' =>'DeskofficerController@viewRegisterCourses','middleware' => 'roles','roles'=>['sa','do']])->name('viewRegisterCourses');

Route::get('deleteRegisterCourse/{id}/{yes?}', ['uses' =>'DeskofficerController@deleteRegisterCourse','middleware' => 'roles','roles'=>['sa','do']]);
Route::get('editRegisterCourse/{id}', ['uses' =>'DeskofficerController@editRegisterCourse','middleware' => 'roles','roles'=>['sa','do']])->name('editRegisterCourse');
Route::post('updateRegisterCourse', ['uses' =>'DeskofficerController@updateRegisterCourse','middleware' => 'roles','roles'=>['sa','do']])->name('updateRegisterCourse');

// =========== enter result

Route::get('getRegisteredStudents', ['uses' =>'DeskofficerController@getRegisteredStudents','middleware' => 'roles','roles'=>['sa','do']])->name('getRegisteredStudents');
Route::post('getRegisteredStudents', ['uses' =>'DeskofficerController@getRegisteredStudents','middleware' => 'roles','roles'=>['sa','do']])->name('getRegisteredStudents');
Route::get('resultDetails/{id}/{level}/{session}/{period}', ['uses' =>'DeskofficerController@resultDetails','middleware' => 'roles','roles'=>['sa','do']])->name('resultDetails');

Route::get('getStudents', ['uses' =>'DeskofficerController@getStudents','middleware' => 'roles','roles'=>['sa','do']])->name('getStudents');
Route::post('getStudents', ['uses' =>'DeskofficerController@getStudents','middleware' => 'roles','roles'=>['sa','do']])->name('getStudents');


Route::get('enterResult/{id}/{level}/{session}/{period}/{token}', ['uses' =>'DeskofficerController@enterResult','middleware' => 'roles','roles'=>['sa','do']])->name('enterResult');
Route::post('insertResult', ['uses' =>'DeskofficerController@insertResult','middleware' => 'roles','roles'=>['sa','do']])->name('insertResult');

// Transcript
Route::get('transcript', ['uses' =>'DeskofficerController@transcript','middleware' => 'roles','roles'=>['sa','do','TO']])->name('transcript');
Route::post('transcript', ['uses' =>'DeskofficerController@getTranscript','middleware' => 'roles','roles'=>['sa','do','TO']])->name('transcript');

// destination
Route::get('destinationAddress', ['uses' =>'TranscriptController@destinationAddress','middleware' => 'roles','roles'=>'TO'])->name('destinationAddress');
Route::post('destinationAddress', ['uses' =>'TranscriptController@post_destinationAddress','middleware' => 'roles','roles'=>'TO'])->name('destinationAddress');

// cover letter
Route::get('getCoverLetter', ['uses' =>'TranscriptController@getCoverLetter','middleware' => 'roles','roles'=>'TO'])->name('getCoverLetter');
Route::post('getCoverLetter', ['uses' =>'TranscriptController@post_CoverLetter','middleware' => 'roles','roles'=>'TO'])->name('getCoverLetter');
// update course tilte
Route::get('courseTitle', ['uses' =>'TranscriptController@courseTitle','middleware' => 'roles','roles'=>['sa','do','TO']])->name('courseTitle');
Route::post('updateOldCourseTitle', ['uses' =>'TranscriptController@updateOldCourseTitle','middleware' => 'roles','roles'=>['sa','do','TO']])->name('updateOldCourseTitle');
Route::get('courseTitle/{matricNumber?}/{level?}', ['uses' =>'TranscriptController@courseTitle','middleware' => 'roles','roles'=>['sa','do','TO']]);
Route::post('updateCourseTitle', ['uses' =>'TranscriptController@updateCourseTitle','middleware' => 'roles','roles'=>['sa','do','TO']])->name('updateCourseTitle');


//delete grade
Route::get('getresultDetail', ['uses' =>'TranscriptController@getresultDetail','middleware' => 'roles','roles'=>['sa','do','TO']])->name('getresultDetail');

Route::get('getresultDetail/{matricNumber?}/{level?}/{period}', ['uses' =>'TranscriptController@getresultDetail','middleware' => 'roles','roles'=>['sa','do','TO']])->name('getresultDetail');
Route::post('delete_grade', ['uses' =>'TranscriptController@delete_grade','middleware' => 'roles','roles'=>['sa','do','TO']])->name('delete_grade');

/*Route::post('updateOldCourseTitle', ['uses' =>'TranscriptController@updateOldCourseTitle','middleware' => 'roles','roles'=>['sa','do','TO']])->name('updateOldCourseTitle');
Route::get('courseTitle/{matricNumber?}/{level?}', ['uses' =>'TranscriptController@courseTitle','middleware' => 'roles','roles'=>['sa','do','TO']]);
Route::post('updateCourseTitle', ['uses' =>'TranscriptController@updateCourseTitle','middleware' => 'roles','roles'=>['sa','do','TO']])->name('updateCourseTitle');*/

// Change Password
Route::get('changePassword', 'GeneralController@changePassword')->name('changePassword');
Route::post('changePassword', 'GeneralController@postChangePassword')->name('changePassword');


Route::get('updatedResult', ['uses' =>'DeskofficerController@updatedResult','middleware' => 'roles','roles'=>['sa','do']])->name('updatedResult');


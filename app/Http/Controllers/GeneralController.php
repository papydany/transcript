<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Lga;
use App\Result;
use App\User;
use Session;
use Auth;
use DNS2D;
use DNS1D;
class GeneralController extends Controller
{
    public function getlga($id)
{
$sql =Lga::where('state_id',$id)->get();
return $sql;
}

public function changePassword(Request $request)
{
return view('general.changepassword');

}

public function postChangePassword(Request $request)
{
    $this->validate($request, [
       'password' => 'required|confirmed',
    ]);
    $user =User::find(Auth::id());
    $user->password =bcrypt($request->password);
    $user->save();
    $request->session()->flash('success', 'account  successfuly Updated!');
 return back();  

}

}

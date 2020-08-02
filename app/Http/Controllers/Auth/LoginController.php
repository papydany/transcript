<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;
use App\Audit;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)

    {
$this->validate($request, [
            'email' => 'required',
            'password' => 'required'
            ]);
            $credentials = $request->only('email', 'password');


if (Auth::attempt($credentials))
 {

    if(Auth::user()->status == 1)
    {
   $audit = New Audit;
   $audit->user_id =Auth::id();
   $audit->activity ="login";
   $audit->save();
  return redirect('/');
    }else{ 
       Auth::logout();
       Session::flash('warning',"Your account has been deactivated.");
       return back(); 
    }
   }else{
            Session::flash('danger',"check your email and password.");
            return back();

        }

   
}
  public function logout(Request $request)
{
Auth::logout();
return redirect('/');
}
}

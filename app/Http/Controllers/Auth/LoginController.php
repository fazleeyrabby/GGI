<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function custom_login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
            return redirect(route('home'));

        }

        else if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) 
        {
            return redirect(route('admin.dashbord'));
            
        }
        else{
            return back()->with('alert','adasdsa');
        }



    }
}

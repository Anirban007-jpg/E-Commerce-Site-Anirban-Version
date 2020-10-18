<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
           'email'=>'required',
            'password'=>'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        $validData = User::where('email', $email)->first();
        $passcheck = password_verify($password,@$validData->password);
        if ($passcheck == false){
            return redirect()->back()->with('message', 'Password does not match');
        }
        if ($validData->status == 0){
            return redirect()->back()->with('message', 'Sorry you are not verified...');
        }
        if (Auth::attempt(['email'=>$email, 'password'=>$password])){
            return redirect()->route('login');
        }
        else {
            return redirect()->back()->with('message', 'Password oe email does not match');
        }

    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

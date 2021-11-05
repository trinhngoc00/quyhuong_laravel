<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    use AuthenticatesUsers{
		logout as performLogout;
	}
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
        $this->middleware('guest')->except('logout', 'getLogout');
    }
    public function getLogin()
	{
		if (Auth::check()) {
			return redirect('user.index');
		} else {
			return view('pages.login');
		}
	}

	public function getLogout(Request $request)
	{
		Auth::logout();

		return view('pages.login');
	}

	public function postLogin(Request $request)
	{
		$input = $request->all();

		$rules = [
			'username' => 'required',
			'password' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect('login')->withErrors($validator)->withInput();
		}
		else {
			$fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			if (Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
				if(Auth::user()->level == 1) {
					return redirect('admin');
				}
				else {
					return redirect('');
				}
			}
			else {
				session()->flash('error', 'Invalid Username or password.');
				return redirect()->back();
			}
		}
	}
}

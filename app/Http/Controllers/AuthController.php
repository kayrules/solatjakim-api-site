<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Classes\Helper;
use Config;
use Theme;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/login';
    protected $redirectPath = '/';

    /**
    * Create a new authentication controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'getLogout']);
        $this->middleware('guest', ['except' => 'GET_logout']);
    }

    // /**
    // * Get a validator for an incoming registration request.
    // *
    // * @param  array  $data
    // * @return \Illuminate\Contracts\Validation\Validator
    // */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    // }
    //
    // /**
    // * Create a new user instance after a valid registration.
    // *
    // * @param  array  $data
    // * @return User
    // */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    public function GET_login()
    {
        $params = array();
        return view('auth.login', $params);
    }

    public function POST_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'email' => 'required|email',
            'username' => 'required|min:3',
            'password' => 'required|min:6',
        ]);

        $errors = array();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $errors[] = $message;
            }
        }

        // $credentials = ['email' => $request->username, 'password' => $request->password];
        $credentials = ['username' => $request->username, 'password' => $request->password];

        if(Auth::attempt($credentials) && !count($errors)) {
            return redirect()->intended(route('_home'));

        } else {
            $errors[] = trans('auth.failed');
            $msg = Helper::arrayToList($errors);
            return redirect(route('_auth.login'))->with('STATUS_FAIL', $msg)->withInput();
        }
    }

    // public function GET_signup()
    // {
    //     $params = array();
    //     return view('auth.signup', $params);
    // }
    //
    // public function POST_signup(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:6',
    //         'email' => 'required|email',
    //     ]);
    //
    //     $errors = array();
    //     if ($validator->fails()) {
    //         foreach ($validator->errors()->all() as $message) {
    //             $errors[] = $message;
    //         }
    //     }
    //
    //     if(!count($errors)) {
    //         $chk = User::where('email', $request->email)->count();
    //         if($chk) {
    //             $errors[] = trans('auth.email_exist', ['email' => $request->email]);
    //         }
    //     }
    //
    //     if(!count($errors)) {
    //         $confirmation_code = str_random(30);
    //         User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => '',
    //             'confirmation_code' => $confirmation_code
    //         ]);
    //
    //         Mail::send('emails.verify', [
    //             'confirmation_code' => $confirmation_code
    //         ], function($message) use($request) {
    //             $message->from(Config::get('constants.email_support'), Config::get('constants.site_name'))
    //             ->to($request->email, $request->name)
    //             ->subject(trans('auth.email_verify_title'));
    //         });
    //
    //         $msg = trans('auth.verify_email');
    //         return redirect(route('_auth.login'))->with('STATUS_OK', $msg);
    //     }
    //     else {
    //         $msg = Helper::arrayToList($errors);
    //         return redirect(route('_auth.signup'))->with('STATUS_FAIL', $msg)->withInput();
    //     }
    // }

    // public function GET_activate($code)
    // {
    //     $user = User::where('confirmation_code', $code)->first();
    //     if($user) {
    //         if($user->activated) {
    //             $msg = trans('auth.already_activated');
    //             return redirect(route('_auth.login'))->with('STATUS_OK', $msg);
    //         }
    //         else {
    //             $params = array(
    //                 'code' => $code,
    //                 'name' => $user->name
    //             );
    //             return view('auth.activate', $params);
    //         }
    //     }
    //     else {
    //         return abort(404);
    //     }
    // }
    //
    // public function POST_activate($code, Request $request)
    // {
    //
    //     $validator = Validator::make($request->all(), [
    //         'password' => 'required|min:6',
    //         'confirmation' => 'required|min:6|same:password',
    //     ]);
    //
    //     $errors = array();
    //     if ($validator->fails()) {
    //         foreach ($validator->errors()->all() as $message) {
    //             $errors[] = $message;
    //         }
    //     }
    //
    //     if(!count($errors)) {
    //         $user = User::where('confirmation_code', $code)->first();
    //         $user->password = bcrypt($request->password);
    //         $user->activated = true;
    //         $user->save();
    //
    //         $msg = trans('auth.verification_success');
    //         return redirect(route('_auth.login'))->with('STATUS_OK', $msg);
    //     }
    //     else {
    //         $msg = Helper::arrayToList($errors);
    //         return redirect(route('_auth.activate', $code))->with('STATUS_FAIL', $msg)->withInput();
    //     }
    //
    // }

    public function GET_logout() {
        Auth::logout();
        // auth()->logout();
        $msg = trans('auth.logout');
        return redirect(route('_auth.login'))->with('STATUS_OK', $msg);
    }
}

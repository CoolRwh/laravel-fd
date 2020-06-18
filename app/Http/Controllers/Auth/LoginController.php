<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**
     * 重新登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.home.login');
    }

    /**
     * 登录方法
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
/*    public function login(Request $request)
    {
        if (auth()->attempt($request->only(['name','password']))){
            session()->flash('success','登录成功！');
            return redirect()->route('admin.home');
        }else{
            return back()->with('error','用户名货密码错误！');
        }
    }*/


    /**
     * 用户名登录
     * @return string
     */
    public function username()
  {
      return 'name';
  }



}

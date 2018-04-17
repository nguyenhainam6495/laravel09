<?php
namespace App\Http\Controllers\AdminAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
	

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    use AuthenticatesUsers;
    protected $redirectTo = 'admin/home';


    public function __construct()
    {
      
    }


    public function showLoginForm()
    {
    	return view('adminauth.login');
    }

    protected function guard()
    {
    	return Auth::guard('admin');
    }
}

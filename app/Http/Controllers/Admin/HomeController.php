<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Login\LoginServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use LdapRecord\Connection;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $loginService;
    public function __construct(LoginServiceInterface $loginService){
        $this->loginService = $loginService;
    }
    public function getLogin(){
        return view('admin.login.index');
    }

    public function postLogin(Request $request){
        return $this->loginService->loginAdmin($request);
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

    public function index(){
        return view('admin.home.index');
    }
}

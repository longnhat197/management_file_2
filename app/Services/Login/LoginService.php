<?php

namespace App\Services\Login;

use App\Models\Detail;
use App\Models\User;
use App\Services\Login\LoginServiceInterface;
use App\Utilities\Constant;
use LdapRecord\Connection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginService implements LoginServiceInterface
{
    public function loginExpert($request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $connection = new Connection([
            'hosts' => ['172.24.104.6'],
            'port' => 389,
            'base_dn' => 'dc=ansv,dc=vn',
            'username' => $email,
            'password' => $password,
        ]);
        $isExit = User::select("*")
            ->where("email", $email)->exists();
        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        $remember = $request->get('remember');
        $isEnabled = User::select("*")
            ->where('email', $email)
            ->where('enabled', 1)
            ->exists();

        try {
            if ($connection->auth()->attempt($email, $password)) {
                if ($isExit) {
                    if (Auth::attempt($credentials, $remember)) {
                        if ($isEnabled) {
                            return redirect('home/add');
                        } else {
                            return redirect()->back()->with('error', 'Liên hệ Admin để kích hoạt tài khoản');
                        }
                    }else{
                        return redirect()->back()->with('error', 'Tài khoản không tồn tại');
                    }
                } else {
                    User::create([
                        'email' => $email,
                        'password' => Hash::make($password),
                        'enabled' => 0,
                        'level' => 2,
                        'name' => substr($email,0,strpos($email, '@'))
                    ]);
                    return redirect()->back()->with('success', 'Đã thêm tài khoản. Cần được Admin kích hoạt để sử dụng');
                }
            }
        } catch (\LdapRecord\Auth\BindException $e) {
            $err = $e->getDetailedError();
            return redirect()->back()->with('error', $err->getErrorMessage());
        }
    }

    public function loginAdmin($request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $connection = new Connection([
            'hosts' => ['172.24.104.6'],
            'port' => 389,
            'base_dn' => 'dc=ansv,dc=vn',
            'username' => $email,
            'password' => $password,
        ]);

        $credentials = [
            'email' => $email,
            'password' => $password,
            'level' => [Constant::user_level_admin], //Tài khoản khách hàng cấp độ host hoặc admin
        ];

        $remember = $request->remember;
        try {
            if ($connection->auth()->attempt($email, $password)) {
                if (Auth::attempt($credentials, $remember)) {
                    return redirect()->intended('admin/home/detail'); // Mặc định là trang chủ
                } else {
                    return back()->with('notification', 'Tài khoản không có quyền truy cập hoặc không tồn tại');
                }

            }
        } catch (\LdapRecord\Auth\BindException $e) {
            $err = $e->getDetailedError();
            return redirect()->back()->with('error', $err->getErrorMessage());
        }
    }
    public function checkOverTime(){
        $today = date('Y-m-d H:i:s');
        $details = Detail::all()->where('enabled',1);
        foreach($details as $detail){
            $time_over = strtotime($detail->time_dong_thau) - strtotime($today);
            if($time_over<0){
                $detail->enabled = 0;
                $detail->update();
            }
        }
    }
}

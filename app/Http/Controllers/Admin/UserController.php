<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {

        $users = $this->userService->searchAndPaginate('name', $request->get('search'))->withPath('http://contract.ansv.vn/admin/home/user');
        // return \App\Models\User::all();
        return view('admin.user.index', compact('users'));
    }

    public function active(User $user)
    {
        try {
            if ($user->enabled == 1) {
                User::where('id', $user->id)->update([
                    'enabled' => 0,
                ]);
                return redirect()->back()->with('success', 'Khoá thành công tài khoản ' . $user->email);
            } else {
                User::where('id', $user->id)->update([
                    'enabled' => 1,
                ]);

                return redirect()->back()->with('success', 'Kích hoạt thành công cho tài khoản ' . $user->email);
            }
        } catch (\Exception $err) {

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function editStore(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->userService->update($data, $id);
        } catch (\Exception $err) {
            return back()->with('error', $err->getMessage());
        }
        return redirect('admin/home/user')->with('success', 'Đã update thành công');
    }
}

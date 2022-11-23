<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService){
        $this->userService = $userService;
    }

    public function index(Request $request){
        $users = $this->userService->searchAndPaginate('name',$request->get('search'));
        // return \App\Models\User::all();
        return view('admin.user.index',compact('users'));
    }

    public function active(User $user){
    try {
        if ($user->enabled == 1) {
            User::where('id', $user->id)->update([
                'enabled' => 0,
            ]);
            return redirect()->back()->with('success', 'Update tình trạng thành công cho sản phẩm '. $user->name);
        } else {
            User::where('id', $user->id)->update([
                'enabled' => 1,
            ]);
            
            return redirect()->back()->with('success', 'Update tình trạng thành công cho sản phẩm '. $user->name);
        }
    } catch(\Exception $err) {

        return redirect()->back()->with('error', $err->getMessage());
    }
}
}

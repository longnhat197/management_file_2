<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use App\Services\Detail\DetailServiceInterface;
use Illuminate\Http\Request;
use App\Services\User\UserServiceInterface;

class UserDetailController extends Controller
{
    private $userService;
    private $detailService;

    public function __construct(UserServiceInterface $userService, DetailServiceInterface $detailService)
    {
        $this->userService = $userService;
        $this->detailService = $detailService;
    }

    public function create()
    {
        $users = $this->userService->all()
        ->where('enabled',1);
        $details = $this->detailService->all();
        return view('admin.userDetail.create', compact('users', 'details'));
    }

    public function store(Request $request)
    {

        $data =  $request->all();
        $isExit = UserDetail::select("*")
            ->where("user_id", $request->get('user_id'))
            ->where('detail_id', $request->get('detail_id'))
            ->exists();
        if ($isExit) {
            return redirect('admin/home/userDetail')->with('error', 'Tài khoản này đã được gán dự án này rồi');
        } else {
            try {
                UserDetail::create($data);
            } catch (\Exception $e) {
                return redirect('admin/home/userDetail')->with('error', $e->getMessage());
            }
            return redirect('admin/home/userDetail')->with('success', 'Đã thêm đành công user vào dự án');
        }
    }
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $userDetails = UserDetail::select("user_details.*")
            ->join('users', 'user_details.user_id', '=', 'users.id')
            ->where('users.email', 'like', '%' . $search . '%')
            ->orderByDesc('created_at')
            ->paginate(8);
        return view('admin.userDetail.index', compact('userDetails'));
    }

    public function delete($id)
    {
        try {
            UserDetail::find($id)->delete();
        } catch (\Exception $e) {
            return redirect('admin/home/userDetail')->with('error', $e->getMessage());
        }
        return redirect('admin/home/userDetail')->with('success', 'Đã xoá thành công công việc');
    }
}

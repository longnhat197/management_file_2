<?php

namespace App\Http\Controllers;

use App\Services\User\UserServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService){
        $this->userService = $userService;
    }
    public function edit($id){
        $user = $this->userService->find($id);
        return view('user.edit',compact('user'));
    }

    public function editStore(Request $request,$id){
        $data = $request->all();
        // $data['name'] == $request->get('name');
        if($_FILES['image']){
            //Thêm file mới:
            $data['avatar'] = Common::uploadFile($request->file('image'),'img/user');

            //Xoá file cũ:
            $file_name_old = $request->get('image_old');
            if($file_name_old != ''){
                unlink('img/user/' . $file_name_old);
            }
        }
        try{
            $this->userService->update($data,$id);
        }catch(\Exception $err){
            return back()->with('error', $err->getMessage());
        }
        return back()->with('success','Update thành công');
    }
}

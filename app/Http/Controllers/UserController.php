<?php

namespace App\Http\Controllers;

use App\Services\User\UserServiceInterface;
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
        $data = [
            'name' =>$request->get('name'),
        ];
        try{
            $this->userService->update($data,$id);
        }catch(\Exception $err){
            return back()->with('error', $err->getMessage());
        }
        return back()->with('success','Update thành công');
    }
}

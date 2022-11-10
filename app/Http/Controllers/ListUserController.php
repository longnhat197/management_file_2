<?php

namespace App\Http\Controllers;

use App\Services\ListUser\ListUserServiceInterface;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    private $listUserService;
    public function __construct(ListUserServiceInterface $listUserService)
    {
        $this->listUserService = $listUserService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listUsers = $this->listUserService->searchAndPaginate('name',$request->get('search'),10);
        return view('listUser.index',compact('listUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();

            if($request->get('type_user') == 1){
                $type = 'người uỷ quyền';
            }
            if($request->get('type_user') == 2){
                $type = 'người được uỷ quyền';
            }
            $this->listUserService->create($data);
        }catch(\Exception $err){
            return redirect('user')->with('error',$err->getMessage());
        }
        return redirect('user')->with('success','Thêm mới thành công '.$type.' '.$request->get('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->listUserService->find($id);
        return view('listUser.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->all();
            $this->listUserService->update($data,$id);
        }catch(\Exception $err){
            return redirect('user')->with('error',$err->getMessage());
        }

        return redirect('user')->with('success','Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

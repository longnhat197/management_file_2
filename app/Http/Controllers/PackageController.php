<?php

namespace App\Http\Controllers;

use App\Services\Package\PackageServiceInterface;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private $packageService;
    public function __construct(PackageServiceInterface $packageService)
    {
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = $this->packageService->searchAndPaginate('name',$request->get('search'),10);

        return view('package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create');
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
            $this->packageService->create($data);
        }catch(\Exception $err){
            return redirect('package')->with('error',$err->getMessage());
        }
        return redirect('package')->with('success','Thêm thành công gói thầu '. $request->get('name'));
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
        $package = $this->packageService->find($id);
        return view('package.edit',compact('package'));
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
            $this->packageService->update($data,$id);
        }catch(\Exception $err){
            return redirect('package')->with('error',$err->getMessage());
        }
        return redirect('package')->with('success','Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = $this->packageService->find($id);
        try{
            $this->packageService->delete($id);
        }catch(\Exception $err){
            return redirect('package')->with('error',$err->getMessage());
        }

        return redirect('package')->with('success','Xoá thành công gói thầu '.$package->name);
    }
}

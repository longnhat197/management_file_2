<?php

namespace App\Http\Controllers;

use App\Services\File\FileServiceInterface;
use Illuminate\Http\Request;
use App\Utilities\Common;
use App\Models\FilePath;

class FilePathController extends Controller
{
    private $fileService;
    public function __construct(FileServiceInterface $fileService){
        $this->fileService = $fileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($file_id)
    {
        $file = $this->fileService->find($file_id);
        $filePaths =$file->filePaths;
        return view('file.path.index',compact('file','filePaths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$file_id)
    {
        $data = $request->all();
        if($request->hasFile('file_upload')){
            $data['path'] = Common::uploadFile($request->file('file_upload'),'dashboard/files');
            unset($data['file_upload']);

            FilePath::create($data);
        }

        return redirect('file/'. $file_id . '/path');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file_id,$file_path_id)
    {
        //Xoá file:
        $file_name = FilePath::find($file_path_id)->path;
        if($file_name != ''){
            unlink('dashboard/files/'.$file_name);
        }

        //Xoá bản ghi trong database
        FilePath::find($file_path_id)->delete();
        return  redirect('file/'.$file_id.'/path');
    }
}

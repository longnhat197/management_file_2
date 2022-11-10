<?php

namespace App\Http\Controllers;

use App\Services\Contractor\ContractorServiceInterface;
use Illuminate\Http\Request;
use App\Services\File\FileServiceInterface;
use App\Utilities\Common;

class FileController extends Controller
{
    private $fileService;
    private $contractorService;
    public function __construct(FileServiceInterface $fileService,ContractorServiceInterface $contractorService)
    {
        $this->fileService = $fileService;
        $this->contractorService = $contractorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = $this->fileService->getFileOnIndex($request,8);
        $contractors = $this->contractorService->all();
        return view('file.index',compact('files','contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contractors = $this->contractorService->all();
        return view('file.create',compact('contractors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $file = $this->fileService->create($data);
        return redirect('file/'.$file->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = $this->fileService->find($id);
        return view('file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contractors = $this->contractorService->all();
        $file = $this->fileService->find($id);
        return view('file.edit', compact('file','contractors'));
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
        $data = $request->all();

        //Cập nhật dữ liệu
        $this->fileService->update($data, $id);
        return redirect('file/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = $this->fileService->find($id);
        $filePaths = $file->filePaths;
        //Xoá file đính kèm
        foreach($filePaths as $filePath){
            if($filePath->path != ''){
                unlink('dashboard/files/' . $filePath->path);
            }
        }

        $this->fileService->delete($id);
        return redirect('file');
    }
}

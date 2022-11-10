<?php

namespace App\Http\Controllers;

use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;
    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = $this->projectService->searchAndPaginate('name', $request->get('search'), 8);
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $this->projectService->create($data);
        } catch (\Exception $err) {
            return redirect('project')->with('error', $err->getMessage());
        }

        return redirect('project')->with('success', 'Thêm mới dự án ' . $request->get('name') . ' thành công');
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
        $project = $this->projectService->find($id);
        return view('project.edit', compact('project'));
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
        try {
            $data = $request->all();
            $this->projectService->update($data, $id);
        } catch (\Exception $err) {
            return redirect('project')->with('error', $err->getMessage());
        }


        return redirect('project')->with('success','Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = $this->projectService->find($id);
            $this->projectService->delete($id);
        } catch (\Exception $err) {
            return redirect('error', $err->getMessage());
        }
        return redirect('project')->with('success', 'Xoá thành công dự án ' . $project->name);
    }
}

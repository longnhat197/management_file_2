<?php

namespace App\Http\Controllers;

use App\Services\Contractor\ContractorServiceInterface;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    private $contractorService;

    public function __construct(ContractorServiceInterface $contractorService)
    {
        $this->contractorService = $contractorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contractors = $this->contractorService->searchAndPaginate('name', $request->get('search'), 8);
        return view('contractor.index', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contractor.create');
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
            $this->contractorService->create($data);
        } catch (\Exception $err) {
            return redirect('contractor')->with('error', $err->getMessage());
        }


        return redirect('contractor')->with('success', 'Thêm mới thành công nhà thầu ' . $request->get('name'));
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
        $contractor = $this->contractorService->find($id);
        return view('contractor.edit', compact('contractor'));
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
            $this->contractorService->update($data, $id);
        } catch (\Exception $err) {
            return redirect('contractor')->with('error', $err->getMessage());
        }
        return redirect('contractor')->with('success','Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contractor = $this->contractorService->find($id);
        try{
            $this->contractorService->delete($id);
        }catch(\Exception $err){
            return redirect('contractor')->with('error',$err->getMessage());
        }

        return redirect('contractor')->with('success','Xoá thành công nhà thầu '.$contractor->name);
    }
}

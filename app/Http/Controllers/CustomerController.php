<?php

namespace App\Http\Controllers;

use App\Services\Customer\CustomerServiceInterface;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class CustomerController extends Controller
{
    private $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $customers = $this->customerService->searchAndPaginate('name', $request->get('search'), 10);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            $this->customerService->create($data);

        } catch (\Exception $err) {
            return redirect('customer')->with('error',$err->getMessage());

        }
        return redirect('customer')->with('success','Thêm mới khách hàng '. $request->get('name').' thành công');
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
        $customer = $this->customerService->find($id);
        return view('customer.edit',compact('customer'));
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
        $this->customerService->update($data,$id);
        }catch(\Exception $err){
            return redirect('customer')->with('error',$err->getMessage());
        }

        return redirect('customer')->with('success','Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $customer = $this->customerService->find($id);
            $this->customerService->delete($id);
        }catch(\Exception $err){
            return redirect('customer')->with('error',$err->getMessage());
        }

        return redirect('customer')->with('success','Đã xoá thành công khách hàng '. $customer->name);
    }
}

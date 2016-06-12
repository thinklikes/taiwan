<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\SupplierRepository;

use App\Http\Requests\ErpRequest;

class SupplierController extends Controller
{
    protected $supplierRepository;
    /**
     * SupplierController constructor.
     *
     * @param SupplierRepository $supplierRepository
     */
    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }
    /**
     * Display a listing of the resource in JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function json(Request $request)
    {
        $suppliers = $this->supplierRepository->getSuppliersJson($request->input());
        return response()->json($suppliers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = $this->supplierRepository->getSuppliersOnePage(array_except($request->input(), 'page'));
        //$suppliers = SupplierRepository::getSuppliersOnePage($request->input());
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //找出之前輸入的資料
        $supplier = $request->old('supplier');
        //if(count($request->old()) > 0) dd($request->old());
        return view('suppliers.create', ['supplier' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErpRequest $request)
    {
        //抓出使用者輸入的資料
        $supplier = $request->input('supplier');
        $new_id = $this->supplierRepository->storeSupplier($supplier);
        return redirect()->action('SupplierController@show', ['id' => $new_id])
                            ->with('status', [0 => '供應商資料已新增!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = $this->supplierRepository->getSupplierDetail($id);
        return view('suppliers.show', ['id' => $id, 'supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if (count($request->old('supplier')) > 0) {
            $supplier = $request->old('supplier');
        } else {
            $supplier = $this->supplierRepository->getSupplierDetail($id);
        }
        return view('suppliers.edit', ['id' => $id, 'supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ErpRequest $request, $id)
    {
        $supplier = $request->input('supplier');
        $this->supplierRepository->updateSupplier($supplier, $id);
        return redirect()->action('SupplierController@show', ['id' => $id])
                            ->with('status', [0 => '供應商資料已更新!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->supplierRepository->deleteSupplier($id);
        return redirect()->action('SupplierController@index')
                            ->with('status', [0 => '供應商資料已刪除!']);
    }
}

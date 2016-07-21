<?php

namespace App\Http\Controllers\Sale;

use App;
use App\Contracts\FormRequestInterface;
use App\Http\Controllers\BasicController;
use ReturnOfSale\ReturnOfSaleRepository as OrderRepository;
use ReturnOfSale\ReturnOfSaleService as orderService;
use Config;
use Illuminate\Http\Request;

class ReturnOfSaleController extends BasicController
{
    protected $orderRepository;
    protected $orderService;
    private $orderMasterInputName = 'returnOfSaleMaster';
    private $orderDetailInputName = 'returnOfSaleDetail';
    private $routeName = 'erp.sale.returnOfSale';
    private $ordersPerPage = 15;
    /**
     * SupplierController constructor.
     *
     * @param SupplierRepository $companyRepository
     */
    public function __construct(
        OrderRepository $orderRepository,
        OrderService $orderService
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderService    = $orderService;
        $this->setFullClassName();
    }

    /**
     * 回傳Json格式的資料
     * @param  string $data_mode 資料類型
     * @param  string $code      搜尋的鍵值
     * @return Json            Json格式的資料
     */
    public function json($data_mode, $code)
    {
        switch ($data_mode) {
            case 'getReceivableByCompanyId':
                $orderMaster = $this->orderRepository->getReceivableByCompanyId($code);
                break;
            default:
                # code...
                break;
        }
        return response()->json($orderMaster->all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->routeName.'.index', [
            'orders' => $this->orderRepository->getOrdersPaginated($this->ordersPerPage)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view($this->routeName.'.create', [
            'new_master_code'           => $this->orderRepository->getNewOrderCode(),
            $this->orderMasterInputName => $request->old($this->orderMasterInputName),
            $this->orderDetailInputName => $request->old($this->orderDetailInputName),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //驗證表單填入的資料
        $request = App::make(
            'App\Contracts\FormRequestInterface',
            ['className' => $this->className]
        );

        //抓出使用者輸入的資料
        $orderMaster = $request->input($this->orderMasterInputName);
        $orderDetail = $request->input($this->orderDetailInputName);

        return $this->orderService->create($this, $orderMaster, $orderDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $orderMaster = $this->orderRepository->getOrderMaster($code);
        //$orderMaster->company_code = $orderMaster->company->code;
        $orderMaster->company_name = $orderMaster->company->company_name;

        $orderDetail = $this->orderRepository->getOrderDetail($code);
        foreach ($orderDetail as $key => $value) {
            $orderDetail[$key]->stock_code = $orderDetail[$key]->stock->code;
            $orderDetail[$key]->stock_name = $orderDetail[$key]->stock->name;
            $orderDetail[$key]->unit = $orderDetail[$key]->stock->unit->comment;
        }
        return view($this->routeName.'.show', [
            $this->orderMasterInputName => $orderMaster,
            $this->orderDetailInputName => $orderDetail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $code)
    {
        if ($request->old()) {
            $orderMaster = $request->old($this->orderMasterInputName);

            $orderMaster['created_at'] = $this->orderRepository
                ->getOrderMasterfield('created_at', $code);

            $orderMaster['received_amount'] = $this->orderRepository
                ->getOrderMasterfield('received_amount', $code);

            $orderMaster['code'] = $code;

            $orderDetail = $request->old($this->orderDetailInputName);
        } else {
            $orderMaster = $this->orderRepository->getOrderMaster($code);

            //$orderMaster->company_code = $orderMaster->company->code;

            $orderMaster->company_name = $orderMaster->company->company_name;

            $orderDetail = $this->orderRepository->getOrderDetail($code);

            foreach ($orderDetail as $key => $value) {
                $orderDetail[$key]->stock_code = $orderDetail[$key]->stock->code;

                $orderDetail[$key]->stock_name = $orderDetail[$key]->stock->name;

                $orderDetail[$key]->unit = $orderDetail[$key]->stock->unit->comment;
            }
        }


        return view($this->routeName.'.edit', [
            $this->orderMasterInputName => $orderMaster,
            $this->orderDetailInputName => $orderDetail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($code)
    {
        //驗證表單填入的資料
        $request = App::make(
            'App\Contracts\FormRequestInterface',
            ['className' => $this->className]
        );

        $orderMaster = $request->input($this->orderMasterInputName);
        $orderDetail = $request->input($this->orderDetailInputName);

        return $this->orderService->update($this, $orderMaster, $orderDetail, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        return $this->orderService->delete($this, $code);
    }

    public function print($code)
    {
        return view($this->routeName.'.print', [
            $this->orderMasterInputName => $this->orderRepository->getOrderMaster($code),
            $this->orderDetailInputName => $this->orderRepository->getOrderDetail($code),
        ]);
    }
}
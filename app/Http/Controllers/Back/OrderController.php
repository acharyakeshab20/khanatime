<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=orders::latest()->paginate(8);
        $products = Products::latest()->get();
        return view('cms.order.index',compact(['orders','products']));
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
    public function store(Request $request)
    {
//        return $request->sku;
        $this->validate($request,[
            'addMoreInputsFields.*.sku'=>'required|unique:orders,sku',
            'addMoreInputsFields.*.name'=>'required',
            'addMoreInputsFields.*.qty'=> 'required',
            'addMoreInputsFields.*.rate' => 'required',
            'addMoreInputsFields.*.address'=> 'required'
//                'sku'=>'required|unique:orders,sku',
//                'name'=>'required|string',
//                 'qty'=>'required|string',
//                 'rate' => 'required|string',
//                 'address'=> 'required|string'
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
           orders::create($value);
        }

        flash('order created successfully');
        return redirect()->route('cms.order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    Public function history(){
        $history=orders::onlyTrashed()->get();
//        dd($history);
            return view('cms.order.history',compact('history'));
    }

    public function restore($id){
        $restore=orders::onlyTrashed()->findOrFail($id);
        $restore->restore();
        flash('Order restore successfully');
        return redirect()->route('cms.order.index');
    }

    public function permanent($id){
        $permanent=orders::onlyTrashed()->findOrFail($id);
        $permanent->forceDelete();
        flash(' Your Order has been deleted Permanently');
        return redirect()->route('cms.order.history');
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
    public function destroy($id)
    {
        $orders=orders::findOrFail($id);
        $orders->delete();
        flash('Orders Deleted Successfully');
        return redirect()->route('cms.order.index');
    }

    public function sku(){
         echo 'esgabj';
    }
}

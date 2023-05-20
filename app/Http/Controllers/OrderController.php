<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_details;
use App\Models\transaction;
use Illuminate\Http\Request;
use App\Models\product;
//use Illuminate\Support\Facades\DB;
use DB;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        
        $lastID =order_details::max('order_id');
        $order_receipt = order_details ::where('order_id',$lastID)->get();

        return view('orders.index',['products' => $products,'orders'=>$orders,'order_receipt' =>$order_receipt]);
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
        
      //return $request->all();
      DB::transaction(function () use ($request){
        $orders = new order;
        $orders->name=$request->customer_name;
        $orders->phone=$request->customer_phone;
        $orders->save();
        $order_id = $orders->id;
        
        for($product_id=0;$product_id < count((array) $request->product_id);$product_id++){
        $order_details =new order_details;
        $order_details->order_id=$order_id;
        $order_details->product_id = $request->product_id[$product_id];
        $order_details->quantity = $request->quantity[$product_id];
        $order_details->unitprice = $request->price[$product_id];
        $order_details->discount = $request->discount[$product_id];
        $order_details->amount = $request->total_amount[$product_id];
        $order_details->save();
        }
        $transaction =new transaction();
        $transaction->order_id =$order_id;
        $transaction->user_id = auth()->user()->id ;
        $transaction->balance = $request->balance;
        $transaction->paid_amount = $request->paid_amount;
        $transaction->payment_method =$request->payment_method;
        $transaction->transac_amount = $order_details->amount;
        $transaction->transac_date = date('Y-m-d');
        $transaction->save();

        $products = product::all();
        $order_details = order_details::where('order_id',$order_id)->get();

        $orderedBy = order::where('id',$order_id)->get();
        return view('orders.index',[
            'products'=>$products,
            'order_details'=>$order_details,
            'customer_orders'=>$orderedBy
        ]);

      });
      return back()->with("product orders fails to intersted! check your inputs!");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}

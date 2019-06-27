<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function PendingOrder()
    {
        $pending=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')->where('order_status','pending')->get();
        return view('pending_order',compact('pending'));
    }

    public function ViewOrder($id)
    {
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.*','orders.*')
            ->where('orders.id',$id)
            ->first();

        $order_details=DB::table('orderdetails')
            ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name','products.product_code')
            ->where('order_id',$id)
            ->get();

        return view('order_confirmation', compact('order','order_details'));


    }

    public function PosDONE($id)
    {
        $approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
        if ($approve) {
            $notification=array(
                'messege'=>'Successfully Order Confirmed ! And All Products Delevered',
                'alert-type'=>'success'
            );
            return Redirect()->route('home')->with($notification);
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function SuccessOrder()
    {
        $success=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')->where('order_status','success')->get();
        return view('success_order',compact('success'));
    }
}

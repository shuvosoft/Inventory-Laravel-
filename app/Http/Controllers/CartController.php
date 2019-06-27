<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){


        $data=array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']=$request->qty;
    	$data['price']=$request->price;
    	$data['weight']=$request->weight;
        $add=Cart::add($data);
        Toastr::success('Product Successfully Added :)' ,'Success');
        return redirect()->back();
    }

    public function CartUpdate(Request $request,$rowId){
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        Toastr::success('Quantity Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    public function CartRemove($rowId){
        Cart::remove($rowId);
        Toastr::success(' Successfully Deleted :)' ,'Success');
        return redirect()->back();
    }

//    create invoice

    public function CreateInvoice(Request $request){
        $request->validate([
            'cus_id' => 'required',
        ]);
        $cus_id=$request->cus_id;
        $customer=DB::table('customers')->where('id',$cus_id)->first();
        $contents=Cart::content();
        return view('invoice', compact('customer','contents'));

    }

//    Order
    public function FinalInvoice(Request $request){
        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;
        $order_id = DB::table('orders')->insertGetId($data);
        $contents=Cart::content();
        $odata=array();
        foreach ($contents as $content){
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']=$content->qty;
            $odata['unitcost']=$content->price;
            $odata['total']=$content->total;
            $insert=DB::table('orderdetails')->insert($odata);
        }

        if ($insert) {

            Toastr::success('Successfully Invoice Created | Please delever the products and accept status :)' ,'Success');
            Cart::destroy();
            return Redirect()->route('home');
        }else{
            $notification=array(
                'messege'=>'error exeption!',
                'alert-type'=>'success'
            );
            Toastr::error('error exeption! :)' ,'Error');
            return Redirect()->back()->with($notification);
        }



    }

}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){
//       $product = Product::all();
//       $category = Category::all();
       $product = DB::table('products')
           ->join('categories','products.cat_id','categories.id')
           ->select('categories.cat_name','products.*')
           ->get();
       $categories = Category::all();

       return view('pos',compact('product','categories'));
   }
}

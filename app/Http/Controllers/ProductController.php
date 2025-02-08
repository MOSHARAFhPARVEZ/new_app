<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function MerchantProductList(){

        $categories = Category::latest()->get();
        $stores = Store::latest()->get();
        $products = Product::latest()->get();
        return view('merchant.product.list',compact('categories','stores','products'));

    } // end method

    public function MerchantProductAdd(Request $request){

       Product::insert([
        'product_name' => $request->product_name,
        'category_name' => $request->category_name,
        'store_name' => $request->store_name,
        'merchant_id' => Auth::user()->id,
        'created_at' => Carbon::now(),
       ]);

       return back()->with('success','Successfully Inserted');

    } // end method


    public function MerchantProductDestroy($id) {
        Product::find($id)->delete();
        return back()->with('success','Successfully Deleted');
    }

}

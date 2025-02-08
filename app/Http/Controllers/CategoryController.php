<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function MerchantCategoryList(){

        $categories = Category::latest()->get();
        return view('merchant.category.list',compact('categories'));

    } // end metohd

    public function MerchantCategoryAdd(Request $request){

        Category::insert([
            'category_name' => $request->category_name,
            'merchant_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','Successfully Inserted');

    } // end metohd


    public function MerchantCategoryDestroy($id) {
        Category::find($id)->delete();
        return back()->with('success','Successfully Deleted');
    }

}

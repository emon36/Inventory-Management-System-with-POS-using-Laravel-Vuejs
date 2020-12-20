<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)

    {
        $product = DB::table('products')->where('id',$id)->first();

        $check = DB::table('pos')->where('product_id',$id)->first();

        if($check){
            DB::table('pos')->where('product_id',$id)->increment('product_quantity');
        }else{

        $data = array();
        $data['product_id'] = $id;
        $data['product_name'] = $product->product_name; 
        $data['product_quantity'] = 1;
        $data['product_price'] = $product->selling_price;
        $data['sub_total'] = $product->selling_price;

        DB::table('pos')->insert($data);
        }


    }

    public function productCart(){

        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }

    public function removeCart($id){
          DB::table('pos')->where('id',$id)->delete();
          return response('Removed');
    }

    public function incremetCart($id){

        $quantity = DB::table('pos')->where('id',$id)->increment('product_quantity');

        $product = DB::table('pos')->where('id',$id)->first();

        $subtotal = $product->product_quantity * $product->product_price;

        DB::table('pos')->where('id',$id)->update(['sub_total' => $subtotal]);
        return response('Done');


    }
    public function decrementCart($id){

        $quantity = DB::table('pos')->where('id',$id)->decrement('product_quantity');

        $product = DB::table('pos')->where('id',$id)->first();

        $subtotal = $product->product_quantity * $product->product_price;

        DB::table('pos')->where('id',$id)->update(['sub_total' => $subtotal]);
        return response('Done');


    }

    public function vats(){

        $vat = DB::table('extra')->select('vat')->first();
        return response()->json($vat);
    }
}

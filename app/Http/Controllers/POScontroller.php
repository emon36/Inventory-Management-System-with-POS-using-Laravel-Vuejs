<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class POScontroller extends Controller
{
    public function getproduct($id){

        $product =  DB::table('products')->where('category_id',$id)->get();

        return response()->json($product);
                  

    }


    public function orderPlace(Request $request){
      
        $validateData = $request->validate([

            'customer_id' => 'required',
            'paidBy' => 'required',

        ]);

        $data = array();

        $data['customer_id'] = $request->customer_id;

        $data['quantity'] = $request->quantity;
        $data['sub_total'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['paid'] = $request->paid;
        $data['due'] = $request->due;
        $data['payBy'] = $request->paidBy;
        $data['order_date'] = date('d/m/Y');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($data);

        $contents = DB::table('pos')->get();

        $order_details = array();

        foreach($contents as $content){
            $order_details['order_id'] = $order_id;
            $order_details['product_id'] = $content->product_id;
            $order_details['product_quantity'] = $content->product_quantity;
            $order_details['product_price'] = $content->product_price;
            $order_details['sub_total'] = $content->sub_total;
            
            DB::table('order_details')->insert($order_details);

            DB::table('products')
                ->where('id',$content->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity -'.$content->product_quantity)]);

        }

        DB::table('pos')->delete();
        return response('Done');

    }

    public function orderSearch(Request $request){

        $orderdate = $request->date;

        $newdate = new DateTime($orderdate);

        $date = $newdate->format('d/m/Y'); 

        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('orders.order_date', $date)
                ->get();



        return response()->json($order);
    }


    public function todaySell(){

        $date = date('d/m/Y');

        $sell = DB::table('orders')->where('order_date',$date)->sum('total');

        return response()->json($sell);

    }

    public function todayIncome(){

        $date = date('d/m/Y');

        $income = DB::table('orders')->where('order_date',$date)->sum('paid');

        return response()->json($income);

    }
    public function todayDue(){

        $date = date('d/m/Y');

        $due = DB::table('orders')->where('order_date',$date)->sum('due');

        return response()->json($due);

    }

    public function todayExpense(){

        $date = date('d/m/Y');

        $expense = DB::table('expenses')->where('expense_date',$date)->sum('amount');

        return response()->json($expense);

    }

    public function Stockout(){

       $product = DB::table('products')->where('product_quantity', '<','1')->get();

       return response()->json($product);
    }


}

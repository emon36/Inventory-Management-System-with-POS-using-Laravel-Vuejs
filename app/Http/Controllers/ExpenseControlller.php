<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use DB;

class ExpenseControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense =  Expense::latest()->get();

        return response()->json($expense);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required',
            'amount' => 'required',
            'expense_date' => 'required'

        ]);

            $expense = new Expense;
            $expense->details = $request->details;
            $expense->amount = $request->amount;
            $expense->expense_date = $request->expense_date;
            $expense->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = DB::table('expenses')->where('id',$id)->first();
        return response()->json($expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();

        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['expense_date'] = $request->expense_date;
        
        DB::table('expenses')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('expenses')->where('id',$id)->delete();
    }
}

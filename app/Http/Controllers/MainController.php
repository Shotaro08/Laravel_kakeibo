<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $month = $request->month;
        $date = $request->date;
        $amount = $request->amount;
        $description = $request->description;

        $request->validate([
            'month' => ['required', 'integer', 'digits_between:1,2'],
            'date' => ['required', 'integer', 'digits_between:1,2'],
            'amount' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:20'],
        ]);

        Main::create([
            'month' => $request->month,
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
            // エラーが出てしまうのでとりあえず追加
            // migrationFileの編集が必要
            'user_id' => 3,
            'year' => 2022,
            'category1_id' => 3,
            'category2_id' => 3,
            'payment_method_id' => 3,

        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}

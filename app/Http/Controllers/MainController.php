<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $e_main = Main::where('user_id', $user_id)->get();

        return view('user.index', compact('e_main'));
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
        $user_id = Auth::id();

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
            // user_id以降エラーが出てしまうのでとりあえず追加
            // migrationFileの編集が必要（nullable or inputform追加）
            'user_id' => $user_id,
            'year' => 2022,
            'category1_id' => 3,
            'category2_id' => 3,
            'payment_method_id' => 3,

        ]);

        return redirect()->route('user.index')
        ->with('message', '支払いを登録しました');
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
        $main_desc = Main::find($id);

        return view('user.edit', compact('main_desc'));
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

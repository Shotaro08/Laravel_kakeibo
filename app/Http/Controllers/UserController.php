<?php

namespace App\Http\Controllers;

use App\Common\CommonMethod;
use App\Common\AmountMethod;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Main;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->get();

        $main = AmountMethod::thisMonth();
        $main_count = $main->count('id');
        $main_amount = $main->sum('amount');

        $categories = PrimaryCategory::all();

        $amountEachCategory =
        [
            'category1' => AmountMethod::amountThisMonthCategory1(),
            'category2' => AmountMethod::amountThisMonthCategory2(),
            'category3' => AmountMethod::amountThisMonthCategory3(),
            'category4' => AmountMethod::amountThisMonthCategory4(),
        ];

        return view('user.dashboard', compact('user', 'main_count', 'main_amount', 'categories','amountEachCategory'));
    }

    public function index()
    {
        // データベースから支払い明細の取得
        $user_id = Auth::id();
        $e_main = Main::where('users_id', $user_id)->get();

        return view('user.index', compact('e_main'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

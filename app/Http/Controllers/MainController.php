<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\PrimaryCategory;
use App\Models\PaymentMethod;
use Carbon\Carbon;
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
        $e_main = Main::where('user_id', $user_id)->paginate(10);

        return view('user.index', compact('e_main'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PrimaryCategory::get();

        $payment_methods = PaymentMethod::get();

        return view('user.create', compact('categories', 'payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $date = new Carbon;
        $thisYear = $date->year;

        $request->validate([
            'month' => ['required', 'integer', 'digits_between:1,2'],
            'date' => ['required', 'integer', 'digits_between:1,2'],
            'amount' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:20'],
            'primary_categories_id' => ['integer'],
            'payment_methods_id' => ['integer'],
        ]);

        Main::create([
            'month' => $request->month,
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => $user_id,
            'year' => $thisYear,
            'primary_categories_id' => $request->category,
            'payment_methods_id' => $request->payment_method,
        ]);

        return redirect()->route('user.index')
            ->with(['message' => '支払いを登録しました', 'status' => 'info']);
    }

    public function edit($id)
    {
        $main_desc = Main::findOrFail($id);

        $categories = PrimaryCategory::get();
        $payment_methods = PaymentMethod::get();

        return view('user.edit', compact('main_desc', 'categories', 'payment_methods'));
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
        $main = Main::findOrFail($id);

        $main->month = $request->month;
        $main->date = $request->date;
        $main->amount = $request->amount;
        $main->description = $request->description;

        dd($main);

        $main->save();

        return redirect()
            ->route('user.index')
            ->with(['message' => '明細を更新しました', 'status' => 'info']);

        // 更新情報取得を確認済
        // dd($main->month, $main->date, $main->amount, $main->description);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Main::findOrFail($id)->delete();

        return redirect()->route('user.index')
            ->with(['message' => '明細を削除しました', 'status' => 'alert']);
    }

    public function deletePostIndex()
    {
        $user_id = Auth::id();
        $deletePosts = Main::where('id', $user_id)->onlyTrashed()->get();

        return view('user.delete-post', compact('deletePosts'));
    }

    public function deletePostDestroy($id)
    {
        $main = Main::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('user.delete-post.index');
    }
}

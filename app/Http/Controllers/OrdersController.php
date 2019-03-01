<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Auth;
use App\Models\Item;


class OrdersController extends Controller
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
    public function index(Request $request, Orders $orders)
    {
        $orders = Orders::where('user_id', Auth::user()->id)->orderBy('id','DESC')->get();
        $totalprice=0;
        foreach ($orders as $order) {
            $item = Item::where('id', $order->id)->first();
            $totalprice+=($item->Price*$order->value);
        }
        return view('orders', [
            'orders' => $orders,
            'totalprice'=>$totalprice
        ]);    
    }
    public function admin(Request $request, Orders $orders)
    {
        $orders = Orders::get();
        $totalprice=0;
        foreach ($orders as $order) {
            $item = Item::where('id', $order->id)->first();
            $totalprice+=($item->Price*$order->value);
        }
        return view('orders', [
            'orders' => $orders,
            'totalprice'=>$totalprice
        ]);    
    }
    public function buy(Request $request, Orders $orders)
    {
        $orders = Orders::where('user_id', Auth::user()->id)->delete();
        return back();
    }
    public function destroy(Request $request, Orders $order)
    {
        $order->delete();
        return back();
    }
    public function show(Request $request, Orders $order)
    {
        dd($order);
    }
}

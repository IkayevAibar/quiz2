<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Item;
use Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store', 'show', 'comment', 'close', 'attachment']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Item $item)
    {
        $items = Item::paginate(15);;
        return view('items', [
            'items' => $items
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-item');
    }
    public function buy(Request $request, Item $item)
    {

        $request->validate([
            'Count' => 'required',
        ]);
        $order = new Orders;
        $order->value = $request->get("Count");
        $order->item_id = $item->id;
        $order->user_id = Auth::user()->id;
        $order->save();
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Brand' => 'required',
            'Price' => 'required',
            'Description' => 'required',
            'Gender' => 'required',
            'Image' => 'required' // 10 mb
        ]);
        $item = new Item;
        $item->Name = $request->get('Name');
        $item->Brand = $request->get('Brand');
        $item->Price = $request->get('Price');
        $item->Description = $request->get('Description');
        $item->Gender = $request->get('Gender');
        $item->Image = $request->get('Image');
        $item->hash = md5(date('Y-m-d H:i:s') . $item->id . $item->Name);
        $item->save();


        return redirect()->route('items.show', ['hash' => $item->hash]);
    }
    public function admin(Request $request)
    {
        $items = Item::paginate(15);;
        $columns = ['Brand', 'Name', 'Price', 'Gender', 'Image'];
        return view('adminpanel', [
            'items' => $items,
            'columns' => $columns
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        return view('item', ['item' => $item]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Item $item)
    {
        //todo
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // dd($item);
        return view('update-item', ['item' => $item]);
    }

    public function updateConcretno(Request $request, Item $item)
    {
        $item->update($request->all());
        $item->save();
        $items = Item::orderBy('id', 'DESC')->get();
        $columns = ['Brand', 'Name', 'Price', 'Gender', 'Image'];
        return redirect()->route('items.show', ['hash' => $item->hash]);
    }
    public function search(Request $request)
    {
        $items = Item::where('name','like','%'.$request->name.'%');
        return view('items', [
            'items' => $items
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {
        $res = Item::where('hash', $item->hash)->delete();
        return back();
    }


}

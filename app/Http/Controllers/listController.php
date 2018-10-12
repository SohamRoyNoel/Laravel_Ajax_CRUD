<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class listController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return view('list', compact('items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->item = $request->text;
        $item->save();
        return 'Done';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $item = Item::find($request->id);
        $item->item = $request->value;
        $item->save();
    }

    public function destroy($id)
    {

    }

    public function delete1(Request $request){

        Item::where('id', $request->id)->delete();
    }
}

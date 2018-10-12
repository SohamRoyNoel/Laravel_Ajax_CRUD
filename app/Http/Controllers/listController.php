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

    public function search(Request $request)
    {
            $term = $request->term; // pulls the value from the searchbar : $request->term; should be used to catch val
            $item = Item::where('item', 'LIKE', '%'. $term . '%')->get();

            if (count($item) == 0){
                $searchResult[] = "no item";
            } else{
                foreach ($item as $key=>$value){
                    $searchResult[] = $value->item;
                }
            }

            return $searchResult;
    }
}

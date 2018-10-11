<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class listController extends Controller
{

    public function index()
    {
        return view('list');
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

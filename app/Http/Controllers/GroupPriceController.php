<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupPrice;

class GroupPriceController extends Controller
{
    public function index()
    {
        return response()->json(GroupPrice::all());
    }

    public function create()
    {
        // TODO: Show the form for creating a new resource
    }

    public function store(Request $request)
    {
        $groupPrice = new GroupPrice();
        $postData = $request->all();
        $groupPrice-fill($postData)->save();
        return response()->redirectToAction('ProductController@create');//ProductController@create es la action mostrada
        // TODO: Store the new resource in /storage/
    }

    public function show($id)
    {
        return response()->json(GroupPrice::find($id));
// TODO: Show a named resource
    }

    public function edit($id)
    {
        // TODO: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, $id)
    {
        // TODO: Update a named resource
    }

    public function destroy($id)
    {
        // TODO: Delete a named resource from storage
    }

}

}

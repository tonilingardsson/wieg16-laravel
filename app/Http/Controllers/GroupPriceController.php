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
        // This does: Show the form for creating a new resource
    }

    public function store(Request $request)
    {
        $groupPrice = new GroupPrice();
        $postData = $request->all();
        $groupPrice-fill($postData)->save();
        return response()->redirectToAction('ProductController@create');//ProductController@create es la action mostrada
        // This does: Store the new resource in /storage/
    }

    public function show($id)
    {
        return response()->json(GroupPrice::find($id));
// This does: Show a named resource
    }

    public function edit($id)
    {
        // This does: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, $id)
    {
        // This does: Update a named resource
    }

    public function destroy($id)
    {
        // This does: Delete a named resource from storage
    }

}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Session;
use View;

class GroupController extends Controller
{
    // CRUD önving

    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'))
            ->with('i', (\request()->input('page', 1)));
        // This does: Display a listing of the resource
    }

    public function create()
    {
        return view('groups.create');
        // This does: Tengo que crear un nuevo view('groups.create')
    }

    public function store(Request $request)
    {
        $group = new Group();
        $postData = $request->all();
        $group-fill($postData)->save();
        return response()->redirectToAction('GroupController@create');//GroupController@create es la action mostrada
        // This does: Store the new resource in /storage/
    }

    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show', compact('group'));// group es la variable, y groups.show es el view para group
        // This does: Show a named resource
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return view('groups.edit', compact('group'));

        // This does: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group-fill($request->all())->save();
        Session::flash('message', 'Successfully updated group.');

        return response()->redirectToAction('GroupController@edit', ['id' =>$id]);
        // This does: Update a named resource
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        Session::flash('message', 'The group is deleted.');

        // This does: Delete a named resource from storage
    }

}

}

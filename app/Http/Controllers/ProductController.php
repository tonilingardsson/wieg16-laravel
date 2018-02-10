<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'))
            ->with('i', (\request()->input('page', 1)));
        // TODO: Display a listing of the resource
    }

    public function create()
    {
        return view('products.create');
        // TODO: Tengo que crear un nuevo view('groups.create')
    }

    public function store(Request $request)
    {
        $product = new Product();
        $postData = $request->all();
        $product-fill($postData)->save();
        return response()->redirectToAction('ProductController@create');//ProductController@create es la action mostrada
        // TODO: Store the new resource in /storage/
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));// product es la variable, y products.show es el view para group
        // TODO: Show a named resource
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));

        // TODO: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product-fill($request->all())->save();
        Session::flash('message', 'Successfully updated product.');

        return response()->redirectToAction('ProductController@edit', ['id' =>$id]);
        // TODO: Update a named resource
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('message', 'The product is deleted.');

        // TODO: Delete a named resource from storage
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

    // CRUD övning

    public function index()
    {
         // TODO: Display a listing of the resource
    }

    public function create()
    {
        // TODO: Show the form for creating a new resource
    }

    public function store(Request $request)
    {
        // TODO: Store the new resource in /storage/
    }

    public function show(Company $company)
    {
        // TODO: Show a named resource
    }

    public function edit(Company $company)
    {
        // TODO: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, Company $company)
    {
        // TODO: Update a named resource
    }

    public function destroy(Company $company)
    {
        // TODO: Delete a named resource from storage
    }

}

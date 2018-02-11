<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

    // CRUD övning

    public function index()
    {
         // This does: Display a listing of the resource
    }

    public function create()
    {
        // This does: Show the form for creating a new resource
    }

    public function store(Request $request)
    {
        // This does: Store the new resource in /storage/
    }

    public function show(Company $company)
    {
        // This does: Show a named resource
    }

    public function edit(Company $company)
    {
        // This does: Edit a named resource, showing the form filled with its features
    }

    public function update(Request $request, Company $company)
    {
        // This does: Update a named resource
    }

    public function destroy(Company $company)
    {
        // This does: Delete a named resource from storage
    }

}

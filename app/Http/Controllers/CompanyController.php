<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $companyData =   DB::select('SELECT * FROM company');
        // return view('company.list')->with('company',$companyData);

        $companies = Company::all();
         return view('CRUD.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('company.create');
        return view('CRUD.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        // $result = DB::insert('INSERT INTO company(name,email,address) VALUES(:name,:email,:address)',[
        //      'name'=> $request->input('name'),
        //      'email'=> $request->input('email'),
        //      'address'=> $request->input('address'),
        // ]);

        // return redirect('company');

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
       ]);
       Company::create($request->all());
       return redirect()->route('company.index')->with('success','company has created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $companyRecord = Company::find($id);
        return view('CRUD.edit',['companyRecord'=>$companyRecord]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
       ]);
        $companyRecord = Company::find($id);
        $companyRecord->fill($request->all())->save();
        return redirect()->route('company.index')->with('success','company has updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $foundRecord = Company::find($id);
        $foundRecord->delete();
        return redirect()->route('company.index')->with('success','company has deleted successfully');



    }
}

<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Resources\CustomersResource;
use App\Http\Resources\CustomersCollection;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CustomersCollection(Customers::paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'full_name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'commune_id' => 'required',
        ]);
        $customers = Customers::create($request->all());
        return new CustomersResource($customers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers, $id)
    {
        return new CustomersResource($customers->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customers)
    {
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'full_name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'commune_id' => 'required',
        ]);
        $customers->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

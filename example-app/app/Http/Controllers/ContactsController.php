<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeContact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeContact::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // no form created for now
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(EmployeeContact::create([
            "emp_id" => $request->emp_id,
            "contact_number" => $request->contact_number,
            "address" => $request->address
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'employee contact Record inserted successfully.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(empty(EmployeeContact::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'employee contact Record not found.'
            ]);

        } else {
            return EmployeeContact::find($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // no form created for now
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empContact = EmployeeContact::find($id);

        if($empContact->update([
            "emp_id" => $request->emp_id,
            "contact_number" => $request->contact_number,
            "address" => $request->address
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'employee contact Record updated successfully.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(empty(EmployeeContact::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Contact Record not found.'
            ]);

        } elseif(EmployeeContact::destroy($id)) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Contact Record deleted successfully.'
            ]);

        }
    }
}

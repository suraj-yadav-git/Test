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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empContact = new EmployeeContact();

        $empContact->contact_id = $request->contact_id;
        $empContact->emp_id = $request->emp_id;
        $empContact->contact_number = $request->contact_number;
        $empContact->address = $request->address;
 
        if($empContact->save()) {
            return response()->json([
                    'status'=>'ok',
                    'message'=>'employee contact Record inserted successfully..'
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
        return EmployeeContact::where('contact_id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(count(EmployeeContact::where('contact_id', $id)->get()) < 1) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Contact Record not found..'
            ]);

        } elseif(EmployeeContact::where('contact_id', $id)->delete()) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Contact Record deleted successfully..'
            ]);

        }
    }
}

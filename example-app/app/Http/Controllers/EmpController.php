<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
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
        if(Employee::create([
            "department_id" => $request->department_id,
            "emp_name" => $request->emp_name
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record inserted successfully.'
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
        if(empty(Employee::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record not found.'
            ]);

        } else {
            return Employee::find($id);
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
        $emp = Employee::find($id);

        if($emp->update([
            'department_id'=>$request->department_id,
            'emp_name'=>$request->emp_name
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record updated successfully.'
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
        if(empty(Employee::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record not found.'
            ]);

        } elseif(Employee::destroy($id)) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record deleted successfully.'
            ]);

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::all();
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
        if(Department::create([
            "department_name" => $request->department_name,
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'department Record inserted successfully.'
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
        if(empty(Department::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Department Record not found.'
            ]);

        } else {
            return Department::find($id);
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
        $department = Department::find($id);

        if($department->update([
            'department_name'=>$request->department_name
        ])) {
            return response()->json([
                'status'=>'ok',
                'message'=>'Department Record updated successfully.'
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
        if(empty(Department::find($id))) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Department Record not found.'
            ]);

        } elseif(Department::destroy($id)) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Department Record deleted successfully.'
            ]);

        }
    }
}

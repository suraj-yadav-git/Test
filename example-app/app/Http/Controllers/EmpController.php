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
        $emp = new Employee();

        $emp->emp_id = $request->emp_id;
        $emp->department_id = $request->department_id;
        $emp->emp_name = $request->emp_name;

        if($emp->save()) {
            return response()->json([
                    'status'=>'ok',
                    'message'=>'Employee Record inserted successfully..'
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
        return Employee::where('emp_id', $id)->get();
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
        if(count(Employee::where('emp_id', $id)->get()) < 1) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record not found..'
            ]);

        } elseif(Employee::where('emp_id', $id)->delete()) {

            return response()->json([
                'status'=>'ok',
                'message'=>'Employee Record deleted successfully..'
            ]);

        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Resources\DepartmentResource as DepartmentResource;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $department=Department::all();
        return [new DepartmentResource($department), "Result" => "All Data has been displayed"]; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $department = new Department();
        $department->department_name=$request->input('department_name');
        $department->designation_id=$request->input('designation_id');
        $department->save();
        return [new DepartmentResource($department), "Result" => "Data has been saved"]; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $department=Department::findOrFail($id);
        return [new DepartmentResource($department), "Result" => "Data has displayed by id"]; 
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
        $department= Department::findOrFail($id);
        $department->department_name=$request->input('department_name');
        $department->designation_id=$request->input('designation_id');
        $department->save();
        return [new DepartmentResource($department), "Result" => "Data has been updated"]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $department= Department::findOrFail($id);
        if($department->delete()){
            return [new DepartmentResource($department), "Result" => "Data has been deleted"];
        }
        else
        {
            return ["Result" => "Data can not be deleted"];
        }
    }
}

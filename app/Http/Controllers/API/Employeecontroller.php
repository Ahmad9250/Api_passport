<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Http\Resources\employee as EmployeeResource;

class Employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display the employ list
        $employ=employee::all();
        return [new EmployeeResource($employ), "Result" => "All Data has been displayed"]; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add employ to database
        $employ = new employee();
        $employ->employee_id=$request->input('employee_id');
        $employ->name=$request->input('name');
        $employ->email=$request->input('email');
        $employ->employee_metadata_id=$request->input('employee_metadata_id');
      
     
        $employ->save();
        return [new EmployeeResource($employ), "Result" => "Data has been saved"]; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //display employ by id
        $employ=employee::findOrFail($id);
        return [new EmployeeResource($employ), "Result" => "Data has displayed by id"]; 
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
        //update employ data by id
        $employ= employee::findOrFail($id);
        $employ->employee_id=$request->input('employee_id');
        $employ->name=$request->input('name');
        $employ->email=$request->input('email');
        $employ->employee_metadata_id=$request->input('employee_metadata_id');
        // $employ->department_id=$request->input('department_id');
        // $employ->contact=$request->input('contact');
        // $employ->address=$request->input('address');
        $employ->save();
        return [new EmployeeResource($employ), "Result" => "Data has been updated"]; 
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete employ record by id
        $employ= employee::findOrFail($id);
        if($employ->delete()){
            return [new EmployeeResource($employ), "Result" => "Data has been deleted"];
        }
        else
        {
            return ["Result" => "Data can not be deleted"];
        }
    }
}

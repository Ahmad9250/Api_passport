<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeMetadata;
use App\Http\Resources\EmployeeMetaDataResource as EmployeeMetaDataResource;


class EmployeeMetaDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $metadata=EmployeeMetadata::all();
        return [new EmployeeMetaDataResource($metadata), "Result" => "All Data has been displayed"]; 
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
        $metadata = new EmployeeMetadata();
        $metadata->bloodgroup=$request->input('bloodgroup');
        $metadata->contact=$request->input('contact');
        $metadata->address=$request->input('address');
        $metadata->date_of_birth=$request->input('date_of_birth');
        $metadata->age=$request->input('age');
        $metadata->salary=$request->input('salary');
        $metadata->joining_date=$request->input('joining_date');
        $metadata->city=$request->input('city');
        $metadata->department_id=$request->input('department_id');
        $metadata->save();
        return [new EmployeeMetaDataResource($metadata), "Result" => "Data has been saved"]; 
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
        $metadata=EmployeeMetadata::findOrFail($id);
        return [new EmployeeMetaDataResource($metadata), "Result" => "Data has displayed by id"]; 
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
        $metadata= EmployeeMetadata::findOrFail($id);
        $metadata->bloodgroup=$request->input('bloodgroup');
        $metadata->contact=$request->input('contact');
        $metadata->address=$request->input('address');
        $metadata->date_of_birth=$request->input('date_of_birth');
        $metadata->age=$request->input('age');
        $metadata->salary=$request->input('salary');
        $metadata->joining_date=$request->input('joining_date');
        $metadata->city=$request->input('city');
        $metadata->department_id=$request->input('department_id');
        $metadata->save();
        return [new EmployeeMetaDataResource($metadata), "Result" => "Data has been updated"]; 
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
        $metadata= EmployeeMetadata::findOrFail($id);
        if($metadata->delete()){
            return [new EmployeeMetaDataResource($metadata), "Result" => "Data has been deleted"];
        }
        else
        {
            return ["Result" => "Data can not be deleted"];
        }
    }
}

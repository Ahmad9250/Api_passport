<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

use App\Http\Resources\Designation as DesignationResource;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designation=Designation::all();
        return [new DesignationResource($designation), "Result" => "All Data has been displayed"]; 
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
        $designation = new Designation();
        $designation->designation_name=$request->input('designation_name');
        $designation->save();
        return [new DesignationResource($designation), "Result" => "Data has been saved"]; 
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
        $designation=Designation::findOrFail($id);
        return [new DesignationResource($designation), "Result" => "Data has displayed by id"]; 
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
        $designation= Designation::findOrFail($id);
        $designation->designation_name=$request->input('designation_name');
        $designation->save();
        return [new DesignationResource($designation), "Result" => "Data has been updated"]; 
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
        $designation= Designation::findOrFail($id);
        if($designation->delete()){
            return [new DesignationResource($designation), "Result" => "Data has been deleted"];
        }
        else
        {
            return ["Result" => "Data can not be deleted"];
        }
    }
}

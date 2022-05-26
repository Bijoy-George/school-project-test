<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('division.index');
    }

    public function searchList(Request $request)
    {
        $results = Division::paginate(10);
        $html = view('division.list_view')->with(compact('results'))->render();
        $result_arr=array('success' => true,'html' => $html);
        return json_encode($result_arr);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes  = SchoolClass::pluck('class_name','id')->all();
        return view('division.create',compact('classes'));
    }


    public function getDivision()
    {
        $classId = request('class_id');
        return Division::where('class_id',$classId)->select('id','division_name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'division_name'      => 'required',
            'class'      => 'required'
        ]);
        Division::create([
            'division_name' => $request->division_name,
            'class_id' => $request->class
            ]);
    
            $result_arr=array('reset'=>true,'success' => true,'status' => 'success','message' => 'Saved successfully', 'redirect_url' => url('division'));
    
            return $result_arr;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }
}

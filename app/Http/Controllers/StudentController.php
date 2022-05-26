<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('student.index');
    }

    public function studentList(Request $request)
    {
        $results = Student::paginate(10);
        $html = view('student.list_view')->with(compact('results'))->render();
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

         return view('student.create',compact('classes'));
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
            'name'      => 'required',
            'class' => 'required',
            'division' => 'required',
        ]);
        $documents_path = config('constant.BLOGS_IMAGE_PATH');
        $file = $request->file('photo');
        $fileName = '';
        if($file)
        {
           $fileName = md5(\Str::random(40).time()).'.'.$file->getClientOriginalExtension();
           $file->move(
            storage_path('app/public') . '/student/', $fileName
            );
        }

        Student::updateOrCreate([
            'id' => $request->id,
        ],
        [
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'class' => $request->class,
            'division' => $request->division,
            'photo' => $fileName
        ]);

        $result_arr=array('reset'=>true,'success' => true,'status' => 'success','message' => 'Saved successfully', 'redirect_url' => url('student'));

        return $result_arr;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.create',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student)
        {
            $student->delete();
            $result_arr=array('success' => true,'message' => 'Deleted Successfully','refresh' =>true);

            return $result_arr;
        }
    }

    public function viewClasses()
    {
        return view('classes.index');
    }

    public function listClass(Request $request)
    {
        $results = SchoolClass::paginate(10);
        $html = view('classes.list_view')->with(compact('results'))->render();
        $result_arr=array('success' => true,'html' => $html);
        return json_encode($result_arr);
    }

    public function createClass()
    {
        return view ('classes.create');
    }

    public function saveClass(Request $request)
    {
        $this->validate($request,[
            'class_name'      => 'required|unique:school_classes,class_name'
        ]);

        SchoolClass::create([
        'class_name' => $request->class_name
        ]);

        $result_arr=array('reset'=>true,'success' => true,'status' => 'success','message' => 'Saved successfully', 'redirect_url' => url('class'));

        return $result_arr;
    }
}

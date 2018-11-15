<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;
use App\Repositories\AssignmentRepository;
use App\Models\Level;
use App\Models\AssignmentSubscription;
use App\Models\Assignment;
use App\Models\SchoolClass;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Auth;

class LecturerController extends Controller
{
	private $class;
	private $assignment;

	public function __construct(ClassRepository $class, AssignmentRepository $assignment ) {
    	$this->middleware('auth');
    	$this->middleware('lecturer');

        $this->class = $class;
        $this->assignment = $assignment;
    }

    public function index()
    {
        $data['levels'] = Level::all();
		$data['classes'] = $this->class->getByAttributes(['lecturer_id' => Auth::user()->lecturer->id], 'AND');
    	return view('lecturer.lecturer-home', $data);
    }

    public function createClass(Request $request)
    {
    	$data = $request->except(['_token']);

    	$class = $this->class->fillAndSave($data);

    	if($class) {
    		return redirect('/lecturer/classes')->with('message', 'Class created');
	    }

	    return ['error' => 'Cannot create a class'];
    }

    public function classes()
    {
        $data['classes'] = $this->class->getByAttributes(['lecturer_id' => Auth::user()->lecturer->id], 'AND');
    	return view('lecturer.listing-lecturer', $data);
    }

    public function newClass()
    {
    	$data['levels'] = Level::all();
    	return view('lecturer.new-class', $data);
    }

    public function deleteClass($id){
        $class = SchoolClass::findOrFail($id);
        $assignments = $class->assignments;
        $studentsClasses = $class->students;
        // $assignments = $this->assignment->getByAttributes(['class_id' => $id], 'AND');
        foreach($assignments as $assignment){
            $assignment->delete();
        }
        foreach($studentsClasses as $studentsClass){
            $studentsClass->delete();
        }
        $class->delete();
        return redirect('/lecturer/classes')->with('message', 'Class deleted successfully');
    }

    public function seeStudentsInClass($id){
        $data['studentsInClass'] = StudentClass::where('class_id', $id)->get();
        // return $data;
        return view('lecturer.classStudents', $data);
    }
}

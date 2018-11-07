<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\AssignmentSubscription;
use App\Models\Assignment;
use App\Models\SchoolClass;
use App\Repositories\ClassRepository;
use App\Repositories\AssignmentRepository;
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
    	return view('lecturer-home');
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
        // return $data;
    	return view('listing-lecturer', $data);
    }

    public function newClass()
    {
    	$data['levels'] = Level::all();
    	return view('new-class', $data);
    }

}

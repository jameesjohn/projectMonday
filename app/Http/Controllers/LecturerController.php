<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\SchoolClass;
use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use Auth;

class LecturerController extends Controller
{
	private $class;

	public function __construct(ClassRepository $class) {
    	$this->middleware('auth');
    	$this->middleware('lecturer');

    	$this->class = $class;
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

    	return view('listing-lecturer', $data);
    }

    public function newClass()
    {
    	$data['levels'] = Level::all();
    	return view('new-class', $data);
    }
    public function viewAssignments(){
        // please fill this
    }
}

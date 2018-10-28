<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;
use App\Repositories\StudentClassRepository;
use Illuminate\Http\Request;
use Auth;

class ClassController extends Controller
{
	private $class;
	private $studentClassRepository;

	public function __construct(ClassRepository $class, StudentClassRepository $studentClassRepository)
	{
		$this->class = $class;
		$this->studentClassRepository = $studentClassRepository;
	}

	public function list()
    {
    	$data['classes'] = $this->class->getByAttributes(['level_id' => Auth::user()->student->level_id]);

    	return view('listing', $data);
    }

    public function joinClass(Request $request)
    {
    	$data = $request->except(['_token']);
    	$data['student_id'] = Auth::user()->student->id;
    	$result = $this->studentClassRepository->fillAndSave($data);

    	if ($result) {
    		return back()->with('message', 'Class Joined Successfully.');
	    }
    }


    public function showClass($classId)
    {
    	$class = $this->class->find($classId, ['assignments']);
    	$data['assignments'] = $class->assignments;
    	$data['class'] = $class;

	    return view('class', $data);
    }

    public function myClasses()
    {
    	$data['classes'] = $this->studentClassRepository->getByAttributes(['student_id' => Auth::user()->student->id], 'AND', ['class'])->pluck('class');

    	return view('my-classes', $data);
    }
}

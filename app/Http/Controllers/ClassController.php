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
    	$data['student_id'] = Auth::user()->id;
    	$result = $this->studentClassRepository->fillAndSave($data);

    	if ($result) {
    		return back()->with('message', 'Class Joined Successfully.');
	    }
    }
}

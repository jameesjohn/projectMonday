<?php

namespace App\Http\Controllers;

use App\Repositories\AssignmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Models\StudentClass;
use App\Models\Assignment;

class AssignmentController extends Controller
{
	private $assignment;

	public function __construct(AssignmentRepository $assignment)
	{
		$this->middleware('auth');
		$this->assignment = $assignment;
	}

	public function submitAssignment($id)
	{
		$assignment = $this->assignment->find($id, ['class']);
		$data['class'] = $assignment->class;
		$data['assignment'] = $assignment;

		return view('submit-assignment', $data);
	}

	public function saveAssignment($id, Request $request)
	{
		$assignment = $this->assignment->find($id);

		$data['filename'] = $request->assignmentFile->storeAs('assignments', Auth::user()->id . '.pdf');
		$data['assignment_id'] = $id;
		$data['submitted'] = 1;
		$data['student_id'] = Auth::user()->student->id;
		$data['id'] = Uuid::uuid1();
		$submitted = $assignment->subscribers()->create($data);

		if ($submitted) {
			return redirect()->route('show.class', $assignment->class->id);
		}

		return ['error' => 'Unable to Submit Assignment'];
	}
    
    public function createAssignment()
	{
		$classes = StudentClass::all();
		return view('create-assignment', compact('classes'));
	}

	public function storeAssignment(Request $request)
	{
		$assignment = new Assignment;
		$assignment->content = $request->input('content');
		$assignment->class_id = $request->input('class_id');
		$assignment->save();

		return back();
	}
}

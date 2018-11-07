<?php

namespace App\Http\Controllers;

use App\Repositories\AssignmentRepository;
use App\Repositories\AssignmentSumissionRepository;
use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Models\StudentClass;
use App\Models\Assignment;

class AssignmentController extends Controller
{
	private $assignment;
	private $class;

	public function __construct(AssignmentRepository $assignment, ClassRepository $class, AssignmentSumissionRepository $subassignment)
	{
		$this->middleware('auth');
		$this->assignment = $assignment;
		$this->subassignment = $subassignment;
		$this->class = $class;
	}

    public function createAssignment()
	{
		$data['classes'] = $this->class->getByAttributes(['lecturer_id' => Auth::user()->lecturer->id], 'AND');;
		return view('create-assignment', $data);
    }

    public function saveAssignment($id, Request $request)
	{
		$assignment = $this->assignment->find($id);

		$data['filename'] = $request->assignmentFile->storeAs('public/assignments', Auth::user()->id . '.pdf');
		$data['assignment_id'] = $id;
		$data['submitted'] = 1;
		$data['student_id'] = Auth::user()->student->id;
        $data['id'] = Uuid::uuid1();
		$submitted = $assignment->subscribers()->create($data);

		if ($submitted) {
			return redirect()->route('show.class', $assignment->class->id)->with("message", "Assignment Submitted Successfully");
		}

		return ['error' => 'Unable to Submit Assignment'];
	}

    public function submitAssignment($id)
	{
		$assignment = $this->assignment->find($id, ['class']);
		$data['class'] = $assignment->class;
		$data['assignment'] = $assignment;
        // return $data;
		return view('submit-assignment', $data);
    }

    public function storeAssignment(Request $request)
	{
        $data = $request->except(['_token']);
		$assignment = $this->assignment->fillAndSave($data);

		if ($assignment) {
			return back()->with('message', 'Assignment Created');
		}

		return back();
    }

    public function viewAssignmentsPerClass($id)
    {
        $data['assignments'] = $this->assignment->getByAttributes(['class_id' => $id], 'AND');
        // return $data;
        return view('assignmentListing',$data);
    }

    public function viewAssignmentSubmissions($id)
    {
         $data['subassignments'] = $this->subassignment->getByAttributes(['assignment_id' => $id], 'AND');
        // return $data;
        return view('submittedAssignmentList', $data);
    }


}

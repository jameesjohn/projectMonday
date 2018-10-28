<?php

namespace App\Http\Controllers;

use App\Repositories\AssignmentRepository;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
	private $assignment;

	public function __construct(AssignmentRepository $assignment)
	{
		$this->assignment = $assignment;
	}

	public function submitAssignment($id)
	{
		$assignment = $this->assignment->find($id, ['class']);
		$data['class'] = $assignment->class;
		$data['assignment'] = $assignment;

		return view('submit-assignment', $data);
	}

	public function saveAssignment($id)
	{
		$assignment = $this->assignment->find($id, ['class']);
		$data['class'] = $assignment->class;
		$data['assignment'] = $assignment;

		return view('submit-assignment', $data);
	}


}

<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubscription;
use App\Models\SchoolClass;
use App\Models\Scoresheet;
use Illuminate\Http\Request;

class ScoresheetController extends Controller
{

    public function scoresheet($subscriptionId)
    {
        $data['assignmentsubscription'] = AssignmentSubscription::findOrFail($subscriptionId);
        $data['lecturer_id'] = $data['assignmentsubscription']->assignment->class->lecturer->id;
        $data['students'] = $data['assignmentsubscription']->assignment->subscribers;
        $data['class'] = $data['assignmentsubscription']->assignment->class;
        return view('lecturer.scoresheet',$data);
        return $data;
    }

    public function updateStudentScore( AssignmentSubscription $studentAssignmentSubscription, $score )
    {
        $studentScoreSheet = Scoresheet::whereAssignmentSubscriptionId($studentAssignmentSubscription->id)->first();
        $studentScoreSheet->score = $score;

        if(!$studentScoreSheet->update()){
            return "Score not updated!";
        }
        return $studentScoreSheet->score;
    }
}

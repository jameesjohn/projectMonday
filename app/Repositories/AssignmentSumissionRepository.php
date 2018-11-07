<?php

namespace App\Repositories;


use App\Models\AssignmentSubscription;

class AssignmentSumissionRepository extends BaseRepository
{
	public function __construct( AssignmentSubscription $class ) {
		parent::__construct( $class );
	}
}

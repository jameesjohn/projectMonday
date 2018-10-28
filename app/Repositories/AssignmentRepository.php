<?php

namespace App\Repositories;


use App\Models\Assignment;

class AssignmentRepository extends BaseRepository
{
	public function __construct( Assignment $class ) {
		parent::__construct( $class );
	}
}
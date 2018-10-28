<?php

namespace App\Repositories;


use App\Models\StudentClass;

class StudentClassRepository extends BaseRepository
{
	public function __construct( StudentClass $class ) {
		parent::__construct( $class );
	}
}
<?php

namespace App\Repositories;


use App\Models\Student;

class StudentRepository extends BaseRepository
{
	public function __construct( Student $class ) {
		parent::__construct( $class );
	}
}
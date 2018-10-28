<?php

namespace App\Repositories;


use App\Models\SchoolClass;

class SchoolClassRepository extends BaseRepository
{
	public function __construct( SchoolClass $class ) {
		parent::__construct( $class );
	}
}
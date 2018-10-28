<?php
/**
 * Created by PhpStorm.
 * User: bosunski
 * Date: 28/10/2018
 * Time: 1:26 PM
 */

namespace App\Repositories;


use App\Models\StudentClass;

class StudentClassRepository extends BaseRepository
{
	public function __construct( StudentClass $class ) {
		parent::__construct( $class );
	}
}
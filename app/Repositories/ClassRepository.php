<?php
/**
 * Created by PhpStorm.
 * User: bosunski
 * Date: 28/10/2018
 * Time: 1:26 PM
 */

namespace App\Repositories;


use App\Models\SchoolClass;

class ClassRepository extends BaseRepository
{
	public function __construct( SchoolClass $class ) {
		parent::__construct( $class );
	}
}
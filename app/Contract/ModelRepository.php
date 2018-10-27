<?php

namespace App\Contract;


use Illuminate\Database\Eloquent\Model;

interface ModelRepository
{
	public function create(\stdClass $data): Model;
}
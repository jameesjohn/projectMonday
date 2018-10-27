<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$levels = collect([100, 200, 300, 400, 500]);

    	$levels->each(function ($level) {
    		factory(App\Models\Level::class)->create(['level' => $level]);
	    });

	    factory(App\User::class, 2)->create(['role' => 'lecturer'])->each(function (App\User $user) {
	    	$lecturer = factory(App\Models\Lecturer::class)->make(['user_id' => $user->id]);
	    	factory(App\Models\SchoolClass::class, 4)->create(['lecturer_id' => $lecturer->id, 'level_id' => $this->getRandomLevelId()]);
	    	$user->lecturers()->save($lecturer);
	    });
    }

    public function getRandomLevelId()
    {
    	$levels = \App\Models\Level::all();

    	return $levels->random()->id;
    }
}

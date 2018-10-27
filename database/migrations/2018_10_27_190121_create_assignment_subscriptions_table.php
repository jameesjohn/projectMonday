<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_subscriptions', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('assignment_id', 36);
            $table->string('student_id', 36);
            $table->string('filename')->nullable();
            $table->boolean('submitted')->default(0);
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_subscriptions');
    }
}

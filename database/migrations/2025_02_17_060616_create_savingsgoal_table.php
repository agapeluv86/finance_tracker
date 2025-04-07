<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('savingsgoal', function (Blueprint $table) {
            $table->id('savings_goal_id');
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->dateTime('created_date')->useCurrent();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('savingsgoal');
    }
};

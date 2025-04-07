<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('income', function (Blueprint $table) {
            $table->id('income_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('incomecategory')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('income');
    }
};

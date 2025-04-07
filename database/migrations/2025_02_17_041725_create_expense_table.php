<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('expense_id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->unsignedBigInteger('category_id'); // Foreign key
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->date('date');

            // Correct foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('expensecategory')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('expense');
    }
};

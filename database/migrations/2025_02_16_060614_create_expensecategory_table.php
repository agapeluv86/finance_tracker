<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('expensecategory', function (Blueprint $table) {
            $table->bigIncrements('category_id'); // Primary key
            $table->string('category_name');
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    public function down(): void {
        Schema::dropIfExists('expensecategory');
    }
};

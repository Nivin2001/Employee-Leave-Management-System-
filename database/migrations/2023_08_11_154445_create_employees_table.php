<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('career');
            $table->foreignId('leave_type_id')
            ->nullable() // Allow null values
            ->default(null) // Set default value to null
                  ->on('leave_types')
                  ->onDelete('cascade');
                  // اذا حذفت الموظف راح ينحذف معه طلب الاجازة التابع اله

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

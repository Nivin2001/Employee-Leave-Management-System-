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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
        // اضافة مفتاح خارجي لجدول leave_types
            $table->foreignId('employee_id')
            ->on('employees')
            ->onDelete('cascade');
            // هذا يعني أنه في حالة حذف موظف ما من جدول employees
            // ، سيتم حذف جميع طلبات الإجازة المرتبطة به تلقائي




            $table->foreignId('leave_type_id')

            ->on('leave_types') // اضافة العلاقة
            // كل طلب اجازة مرتبط مع نوع اجازة
            ->onDelete('cascade');

            // عندما يتم حذف نوع الاجازة سيتم حذف جميع طلبات الاجازة المرتبطة بها

            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); //موافق مرفوص معلق
            $table->text('approval_reason');// سبب الرفض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};

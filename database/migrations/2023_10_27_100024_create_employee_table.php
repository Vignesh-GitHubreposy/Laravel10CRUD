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
            $table->id('emp_id');
            $table->string('emp_name');
            $table->string('emp_email');
            $table->string('emp_phno');
            $table->date('emp_dob');
            $table->longText('emp_address');
            $table->string('emp_designation');
            $table->date('emp_doj');
            $table->longText('emp_photo');
            // $table->foreignId('created_by')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
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

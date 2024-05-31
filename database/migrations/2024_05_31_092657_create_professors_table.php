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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');   //ไปเชื่อมกัยตาราง department
            $table->text('major')->nullable();
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();

            $table->foreign('department_id')  //อ้างอิงตารางคณะ เพราะอาจารย์ต้องมีสังกัดคณะ
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};

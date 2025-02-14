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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            //$table->uuid('uuid')->index();   //เพิ่มทีหลัง
            $table->text('name_th');
            $table->text('name_en');
            $table->string('code');
            $table->text('description');
            $table->string('unit')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('view')->default(0);   //เป็นประเภทข้อมูลที่สามารถเก็บตัวเลขจำนวนเต็ม
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};

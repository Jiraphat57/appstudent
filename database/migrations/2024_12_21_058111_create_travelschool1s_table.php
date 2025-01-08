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
        if(!Schema::hasTable('travelschool1s')) {
        Schema::create('travelschool1s', function (Blueprint $table) {
            $table->id();
            $table->string('nametravelschool',30);
            // $table->string('footprint',10);   //เดินเท้า
        //   $table->string('publictransit',10);   //พาหนะไม่เสียค่าโดยสาร
            // $table->string('paidtransportation',10);   //พาหนะเสียค่าโดยสาร
            // $table->string('bicycle',10);   //จักรยาน
            $table->timestamps();
        });
        }
        // Schema::table('travelschool1s', function (Blueprint $table) {
        //     $table->foreignId('students_id') //คำนำหน้าชื่อ
        //     ->constrained('students')
        //     ->onUpdate('cascade')->onDelete('restrict');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelschool1s');
    }
};

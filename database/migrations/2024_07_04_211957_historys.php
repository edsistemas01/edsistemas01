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
        Schema::create('historys', function (Blueprint $table) {
            $table->id();
            $table->datetime('his_date');
            $table->string('his_shift');
            $table->foreignId('doctor_id')->nullable()->index();
            // $table->bigInteger('doctor_id');
            $table->foreignId('patient_id')->nullable()->index();
            //$table->integer('patient_id');
            $table->string('his_pressure');
            $table->string('his_fcardiac');
            $table->float('his_temperature');
            $table->string('his_ppoxygen');
            $table->string('his_glucose');
            $table->string('his_allergies');
            $table->string('his_diagnostic');
            $table->string('his_treatment');
            $table->string('his_references');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historys');
    }
};

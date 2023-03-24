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
        Schema::create('study_detail_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('study_hours_report_id');
            $table->integer('language_reports_id');
            $table->integer('content_reports_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_detail_reports');
    }
};

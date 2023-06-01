<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanchagarhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panchagarhs', function (Blueprint $table) {
            $table->id();
            $table->string('সাল');
            $table->string('ইউনিয়ন')->nullable();
            $table->integer('ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির')->nullable();
            $table->integer('মোঃ_মজাহারুল_হক_প্রধান')->nullable();
            $table->integer('মোট_ভোটার')->nullable();
            $table->integer('মোট_বৈধ')->nullable();
            $table->integer('মোট_বাতিল')->nullable();
            $table->integer('প্রদত্ত_ভোট')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panchagarhs');
    }
}

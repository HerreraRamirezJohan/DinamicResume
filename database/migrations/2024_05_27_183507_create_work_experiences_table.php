<?php

use App\Models\Resume;
use App\Models\User;
use App\Models\WorkExperience;
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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false);
            $table->string('job_title', 150);
            $table->string('employer', 150);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->mediumText('description');
            $table->timestamps();
        });

        Schema::create('resume_workexperience', function (Blueprint $table){
           $table->id();
           $table->foreignIdFor(Resume::class);
           $table->foreignIdFor(WorkExperience::class);
           $table->timestamps();

           $table->unique(['resume_id', 'work_experience_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};

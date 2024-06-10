<?php

use App\Models\Education;
use App\Models\Resume;
use App\Models\User;
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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false);
            $table->string('institution', 200);
            $table->string('title', 200);
            $table->mediumText('activities');
            $table->string('document', 255);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('resume_education', function (Blueprint $table){
            $table->id();
            $table->foreignIdFor(Resume::class);
            $table->foreignIdFor(Education::class);
            $table->timestamps();

            $table->unique(['resume_id', 'education_id']);
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};

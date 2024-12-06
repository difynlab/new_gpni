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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            // Common fields
                $table->string('title');
                $table->string('duration');
                $table->enum('language', ['English', 'Chinese', 'Japanese']);
                $table->enum('type', ['Certification', 'Masters']);
                $table->enum('course_status', ['Present', 'Upcoming']);
                $table->string('no_of_modules');
                $table->string('no_of_students_enrolled');
                $table->decimal('price', 10, 2);
                $table->string('image');
                $table->string('video');
                $table->text('short_description');
                $table->string('instructor_name');
                $table->string('instructor_designation');
                $table->string('instructor_profile_image');

                $table->integer('instalment_months')->nullable();
                $table->decimal('instalment_price', 10, 2)->nullable();
                $table->string('instalment_price_id')->nullable();

                $table->text('course_introduction')->nullable();
                $table->text('course_content')->nullable();
                $table->text('course_chapter')->nullable();
                $table->text('certificate_images')->nullable();
            // Common fields

            // Certification course fields
                $table->text('certification_section_2_title')->nullable();
                $table->text('certification_section_2_description')->nullable();
                $table->text('certification_section_2_image')->nullable();
                $table->text('certification_section_2_points')->nullable();
                $table->text('certification_section_3_title')->nullable();
                $table->text('certification_section_3_points')->nullable();
                $table->text('certification_section_4_video')->nullable();
                $table->text('certification_section_5_title')->nullable();
                $table->text('certification_section_5_description')->nullable();
                $table->text('certification_section_5_rating')->nullable();
                $table->text('certification_section_5_content')->nullable();
                $table->text('certification_section_5_name')->nullable();
                $table->text('certification_section_5_designation')->nullable();
                $table->text('certification_section_6_title')->nullable();
                $table->text('certification_section_6_description')->nullable();
                $table->text('certification_section_6_teams')->nullable();
                $table->text('certification_section_7_title')->nullable();
                $table->text('certification_section_7_description')->nullable();
                $table->text('certification_section_7_video')->nullable();
                $table->text('certification_section_7_labels_links')->nullable();
                $table->text('certification_section_9_image')->nullable();
                $table->text('certification_section_9_content')->nullable();
                $table->text('certification_section_10_content')->nullable();
                $table->text('certification_section_10_video')->nullable();
                $table->text('certification_section_10_label_link')->nullable();
                $table->text('certification_section_10_points')->nullable();
                $table->text('certification_section_11_content')->nullable();
                $table->text('certification_section_11_video')->nullable();
                $table->text('certification_section_11_label_link')->nullable();
                $table->text('certification_section_12_title')->nullable();
                $table->text('certification_section_12_label_link')->nullable();
                $table->text('certification_section_13_title')->nullable();
                $table->text('certification_section_13_description')->nullable();
                $table->text('certification_section_13_first_column')->nullable();
                $table->text('certification_section_13_second_column')->nullable();
                $table->text('certification_section_13_third_column')->nullable();
                $table->text('certification_section_13_table_points')->nullable();
                $table->text('certification_section_13_labels_links')->nullable();
                $table->text('certification_section_14_title')->nullable();
                $table->text('certification_section_14_video')->nullable();
                $table->text('certification_section_15_title')->nullable();
                $table->text('certification_section_15_content')->nullable();
                $table->text('certification_section_15_video')->nullable();
                $table->text('certification_section_15_label_link')->nullable();
                $table->text('certification_section_15_points')->nullable();
                $table->text('certification_section_16_title')->nullable();
                $table->text('certification_section_16_content')->nullable();
                $table->text('certification_section_16_labels_links')->nullable();
            // Certification course fields

            // Master course fields
                $table->text('master_section_2_title')->nullable();
                $table->text('master_section_2_description')->nullable();
                $table->text('master_section_2_points')->nullable();
                $table->text('master_section_3_title')->nullable();
                $table->text('master_section_3_description')->nullable();
                $table->text('master_section_3_label_link')->nullable();
                $table->text('master_section_4_image')->nullable();
                $table->text('master_section_4_content')->nullable();
                $table->text('master_section_4_label_link')->nullable();
                $table->text('master_section_5_title')->nullable();
                $table->text('master_section_5_label_link')->nullable();
                $table->text('master_section_6_title')->nullable();
                $table->text('master_section_6_description')->nullable();
                $table->text('master_section_6_content')->nullable();
                $table->text('master_section_7_title')->nullable();
                $table->text('master_section_7_video')->nullable();
                $table->text('master_section_8_title')->nullable();
                $table->text('master_section_8_description')->nullable();
                $table->text('master_section_8_videos')->nullable();
                $table->text('master_section_9_title')->nullable();
                $table->text('master_section_9_description')->nullable();
                $table->text('master_section_10_title')->nullable();
                $table->text('master_section_10_description')->nullable();
            // Master course fields

            // Material & logistic field
                $table->string('material_logistic')->nullable();
                $table->decimal('material_logistic_price', 10, 2)->nullable();
            // Material & logistic field

            $table->enum('final_exam', ['Yes', 'No'])->default('No');
            $table->enum('time_required', ['Yes', 'No'])->default('No');
            $table->time('exam_time')->nullable();

            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

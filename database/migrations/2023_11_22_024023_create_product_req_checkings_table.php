<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReqCheckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p5_prod_req_checkings', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('request_id')->comment = 'id from p1_product_identifications';
            $table->foreignId('request_id')->references('id')->on('p1_product_identifications')->comment ='p1_product_identifications (table)';
            // $table->foreign('request_id')->references('id')->on('p1_product_identifications');
            // // 1.0 PRODUCTION
            // $table->unsignedTinyInteger('prod_eval_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_japan_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_last_prodn_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_dieset_eval_report')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_cosmetic_defect')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_pingauges')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_measurescope')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('prod_na')->nullable()->comment = '1 - Checked';
            // $table->string('prod_visual_insp_name')->nullable();
            // $table->string('prod_visual_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('prod_visual_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('prod_dimension_insp_name')->nullable();
            // $table->string('prod_dimension_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('prod_dimension_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('prod_actual_checking_remarks')->nullable();
            // //2.0 ENGGR(TECHNICIAN)
            // $table->unsignedTinyInteger('engr_tech_eval_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_japan_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_last_prodn_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_material_drawing')->nullable()->comment = '1 - Checked';
            // $table->string('engr_tech_material_drawing_no')->nullable();
            // $table->string('engr_tech_material_rev_no')->nullable();
            // $table->unsignedTinyInteger('engr_tech_insp_guide')->nullable()->comment = '1 - Checked';
            // $table->string('engr_tech_insp_guide_drawing_no')->nullable();
            // $table->string('engr_tech_insp_guide_rev_no')->nullable();
            // $table->unsignedTinyInteger('engr_tech_dieset_eval_report')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_cosmetic_defect')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_pingauges')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_measurescope')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('engr_tech_na')->nullable()->comment = '1 - Checked';
            // $table->string('engr_tech_visual_insp_name')->nullable();
            // $table->string('engr_tech_visual_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('engr_tech_visual_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('engr_tech_dimension_insp_name')->nullable();
            // $table->string('engr_tech_dimension_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('engr_tech_dimension_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('engr_tech_actual_checking_remarks')->nullable();
            // //3.0 LQC
            // $table->unsignedTinyInteger('lqc_eval_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_japan_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_last_prodn_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_material_drawing')->nullable()->comment = '1 - Checked';
            // $table->string('lqc_material_drawing_no')->nullable();
            // $table->string('lqc_material_rev_no')->nullable();
            // $table->unsignedTinyInteger('lqc_insp_guide')->nullable()->comment = '1 - Checked';
            // $table->string('lqc_insp_guide_drawing_no')->nullable();
            // $table->string('lqc_insp_guide_rev_no')->nullable();
            // $table->unsignedTinyInteger('lqc_dieset_eval_report')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_cosmetic_defect')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_pingauges')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_measurescope')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('lqc_na')->nullable()->comment = '1 - Checked';
            // $table->string('lqc_visual_insp_name')->nullable();
            // $table->string('lqc_visual_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('lqc_visual_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('lqc_dimension_insp_name')->nullable();
            // $table->string('lqc_dimension_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('lqc_dimension_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('lqc_actual_checking_remarks')->nullable();
            // //4.0 PROCESS ENGGR
            // $table->unsignedTinyInteger('process_engr_eval_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_japan_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_last_prodn_sample')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_material_drawing')->nullable()->comment = '1 - Checked';
            // $table->string('process_engr_material_drawing_no')->nullable();
            // $table->string('process_engr_material_rev_no')->nullable();
            // $table->unsignedTinyInteger('process_engr_insp_guide')->nullable()->comment = '1 - Checked';
            // $table->string('process_engr_insp_guide_drawing_no')->nullable();
            // $table->string('process_engr_insp_guide_rev_no')->nullable();
            // $table->unsignedTinyInteger('process_engr_dieset_eval_report')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_cosmetic_defect')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_pingauges')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_measurescope')->nullable()->comment = '1 - Checked';
            // $table->unsignedTinyInteger('process_engr_na')->nullable()->comment = '1 - Checked';
            // $table->string('process_engr_visual_insp_name')->nullable();
            // $table->string('process_engr_visual_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('process_engr_visual_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('process_engr_dimension_insp_name')->nullable();
            // $table->string('process_engr_dimension_insp_datetime')->nullable();
            // $table->unsignedTinyInteger('process_engr_dimension_insp_result')->nullable()->comment = '0 - NG, 1 - OK';
            // $table->string('process_engr_actual_checking_remarks')->nullable();

            // // Defaults
            // $table->unsignedBigInteger('created_by')->nullable();
            // $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->foreignId('created_by')->references('id')->on('tbl_users')->comment ='tbl_users (table)';
            $table->foreignId('last_updated_by')->references('id')->on('tbl_users')->comment ='tbl_users (table)';
            $table->tinyInteger('status')->default(0)->comment = '0-Unchanged, 1 - Production Update, 2 - Engr Tech Update, 3 - LQC update, 4 - Process Engr Update';
            $table->tinyInteger('logdel')->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign Key
            // $table->foreign('request_id')->references('id')->on('p1_product_identifications');
            // $table->foreign('created_by')->references('id')->on('tbl_users');
            // $table->foreign('last_updated_by')->references('id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p5_prod_req_checkings');
    }
}

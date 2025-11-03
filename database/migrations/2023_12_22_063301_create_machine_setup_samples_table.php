<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineSetupSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p5_machine_setup_samples', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('request_id')->comment = 'id from p1_product_identifications';
            $table->unsignedTinyInteger('number_of_shots')->nullable()->comment = '1 - Checked';
            $table->string('actual_quantity')->nullable();
            $table->unsignedTinyInteger('judgement')->nullable()->comment = '1 - Checked';
            $table->unsignedTinyInteger('machine_parts')->nullable()->comment = '1 - Checked';
            $table->unsignedTinyInteger('output_path')->nullable()->comment = '1 - Checked';
            $table->unsignedTinyInteger('product_catcher')->nullable()->comment = '1 - Checked';
            $table->string('pic')->nullable();
            $table->string('pic_datetime')->nullable();
            $table->string('engr')->nullable();
            $table->string('engr_datetime')->nullable();
            $table->string('qc')->nullable();
            $table->string('qc_datetime')->nullable();

            // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->tinyInteger('status')->default(0)->comment = '0-Unchanged, 1 - Process Eng`g Update, 2 - QC update';
            $table->tinyInteger('logdel')->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign Key
            $table->foreign('request_id')->references('id')->on('p1_product_identifications');
            $table->foreign('created_by')->references('id')->on('tbl_users');
            $table->foreign('last_updated_by')->references('id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p5_machine_setup_samples');
    }
}

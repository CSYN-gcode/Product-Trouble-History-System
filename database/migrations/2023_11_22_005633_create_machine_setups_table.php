<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p4_machine_setups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('request_id')->comment = 'id from p1_product_identifications';
            $table->unsignedTinyInteger('1st_adjustment')->nullable()->comment = '1 - Checked';
            $table->unsignedTinyInteger('2nd_adjustment')->nullable()->comment = '1 - Checked';
            $table->unsignedTinyInteger('3rd_adjustment')->nullable()->comment = '1 - Checked';
            $table->unsignedBigInteger('1st_in_charged')->nullable();
            $table->unsignedBigInteger('2nd_in_charged')->nullable();
            $table->unsignedBigInteger('3rd_in_charged')->nullable();
            $table->string('1st_date_time')->nullable();
            $table->string('2nd_date_time')->nullable();
            $table->string('3rd_date_time')->nullable();

            // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->tinyInteger('status')->default(0)->comment = '0-Unchanged, 1-Updated';
            $table->tinyInteger('logdel')->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign Key
            $table->foreign('request_id')->references('id')->on('p1_product_identifications');
            $table->foreign('1st_in_charged')->references('id')->on('tbl_users');
            $table->foreign('2nd_in_charged')->references('id')->on('tbl_users');
            $table->foreign('3rd_in_charged')->references('id')->on('tbl_users');
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
        Schema::dropIfExists('p4_machine_setups');
    }
}

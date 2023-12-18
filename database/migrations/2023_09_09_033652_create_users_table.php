<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rapidx_id')->nullable()->comment = 'RapidX User(table) id';
            $table->string('section');
            $table->tinyInteger('position')->comment = '	1 - Production Operator, 2 - Die Maintenance Engr, 3 - Process Technician, 4 - Process Engr, 5 - LQC, 6 - Sr. Engr, 7 - Manager, 8 - Administrator';
            $table->unsignedTinyInteger('status')->default(0)->comment = '0-Active, 1-Not-Active';
            $table->unsignedBigInteger('user_level_id')->comment = '1-Admin, 2-Staff, 3-User';

           // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->tinyInteger('logdel')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_level_id')->references('id')->on('tbl_user_levels');
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
        Schema::dropIfExists('tbl_users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable1 extends Migration
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
            $table->bigint('rapidx_id');
            $table->bigint('section');
            $table->tinyInteger('position')->default(0)->comment = '0-N/A,1-Prod Supervisor,2-QC Supervisor,3-Material Handler,4-Operator,5-Inspector';
            $table->unsignedTinyInteger('status')->default(0)->comment = '0-Active, 1-Not-Active';
            $table->unsignedBigInteger('user_level_id')->comment = '1-Admin, 2-Staff, 3-User, 4-Others';

           // Defaults
            $table->unsignedBigInteger('date_created')->nullable();
            $table->unsignedBigInteger('last_updated')->nullable();
            $table->tinyInteger('logdel')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign key
            $table->foreign('user_level_id')->references('id')->on('user_levels');
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

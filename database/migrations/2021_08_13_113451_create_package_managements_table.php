<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_managements', function (Blueprint $table) {
            $table->id();
            $table->integer('item_code');
            $table->integer('weight');
            $table->text('delivery_address');
            $table->string('customer_name');
            $table->string('customer_mobile_number');
            $table->integer('driver_id');
            $table->integer('vehicle_management_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_managements');
    }
}

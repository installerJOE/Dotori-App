<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_addresses', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->renameColumn('street', 'address');
            $table->renameColumn('state', 'address_detail');
            $table->renameColumn('country', 'zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_addresses', function (Blueprint $table) {
            $table->string('city');
            $table->renameColumn('address', 'street');
            $table->renameColumn('address_detail', 'state');
            $table->renameColumn('zip_code', 'country');
        });
    }
}

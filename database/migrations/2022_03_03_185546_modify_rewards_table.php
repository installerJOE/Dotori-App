<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreignId('subscribed_user_id')
                ->constrained('subscribed_users')
                ->onDelete('cascade');
            $table->integer('rpoint')->default(0);
            $table->integer('percent_reward')->default(0);
            $table->dropColumn('spoints');
        });

        Schema::table('rewards', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->dropForeign('subscribed_user_id');
            $table->dropColumn('subscribed_user_id');
            $table->dropColumn('rpoint');
            $table->dropColumn('percent_reward');
            $table->integer('spoints')->default(0);
        });
    }
}

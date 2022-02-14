<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribed_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('repurchase')->default(0);
            $table->string('status');
            $table->float('percent_paid')->default(0.00);
            $table->foreignId('rank_id')
                ->constrained('ranks')
                ->onDelete('cascade');
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
        Schema::dropIfExists('subscribed_users');
    }
}

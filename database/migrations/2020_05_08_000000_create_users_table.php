<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->integer('sns_id');
            $table->string('sns_type');
            $table->boolean('admin')->default(FALSE);
            $table->uuid('if_uuid')->nullable();
            $table->timestamp('certificated_at')->nullable();
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
        \Schema::dropIfExists('users');
    }
}

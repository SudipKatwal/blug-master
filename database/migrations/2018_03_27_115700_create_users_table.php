<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('phone_no');
            $table->string('gender');
            $table->string('interests')->nullable();
            $table->string('thumbnails')->nullable();

            $table->double('balance')->default(0);
            $table->timestamp('balance_updated_at')->nullable();

            $table->boolean('is_active')->default(true);

            $table->boolean('email_verified')->default(false);
            $table->boolean('phone_verified')->default(false);

            $table->string('verification_token')->nullable();
            $table->string('token_created_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('banner')->nullable();
            $table->string('text')->nullable();
            $table->string('user_type')->default('client');
            $table->enum('status',['unapproved','approved'])->default('unapproved');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
        array(
            'email' => 'admin@promo.com',
            'name' => 'admin',
            'contact_name' => 'admin',
            'contact_phone' => '0909',
            'password' => '$2y$10$gXsVeEjKriyxyLQY2B9QCud7vs7AVwLNkqVL93LbqunKokx1TR9w6',
            'user_type' => 'admin',
            'status' => 'approved',
            'email_verified_at' => '2020-03-07 18:17:58',
            'created_at' => '2020-03-07 18:17:58'
        )
    );
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

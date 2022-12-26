<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 16)->unique();
            $table->string('email', 32)->unique();
            $table->string('password', 256);
            $table->enum('role', ['user', 'manager', 'admin']);
            $table->text('photoUrl');
            $table->text('biography');
            $table->enum('gender', ['Man', 'Woman']);
            $table->integer('age');
            $table->boolean('isVerified')->default(false);
            $table->timestamp('emailVerifiedAtTime')->nullable();
            $table->timestamps();
            $table->boolean('requestDelete')->default(false);
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
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('github_users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('html_url')->nullable();
            $table->string('type')->nullable();
            $table->boolean('site_admin')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('bio')->nullable();
            $table->integer('public_repos')->nullable();
            $table->integer('followers')->nullable();
            $table->integer('following')->nullable();
            $table->string('location_lat')->nullable();
            $table->string('location_long')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('created_at_git')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('github_users');
    }
};

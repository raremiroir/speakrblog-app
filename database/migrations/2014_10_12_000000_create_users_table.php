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
        Schema::table('users', function (Blueprint $table) {
            $table->id()->primary();                                // id
            $table->string('username')->unique();                   // username
            $table->string('email')->unique();                      // email
            $table->string('avatar')->nullable();                   // avatar
            $table->timestamp('email_verified_at')->nullable();     // is email verified
            $table->string('password');                             // password
            $table->boolean('is_admin')->default(false);            // is admin
            $table->rememberToken();                                // token for remember me
            $table->timestamps();                                   // created_at, updated_at
            $table->softDeletes();                                  // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

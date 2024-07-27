<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create("sys_user", function (Blueprint $table): void {
            $table->id();
            $table->string("created_platform", 3)->nullable();
            $table->string("created_by", 10)->nullable();
            $table->dateTime("created_at") ->nullable();

            $table->string("updated_platform", 3)->nullable();
            $table->string("updated_by", 10)->nullable();
            $table->dateTime("updated_at") ->nullable();

            $table->string("deleted_platform", 3)->nullable();
            $table->string("deleted_by", 10)->nullable();
            $table->dateTime("deleted_at") ->nullable();

            $table->string("uuid", 50)->unique();
            $table->string("username", 50)->unique();
            $table->string("secret_pwd", 100);
            $table->string("secret_pwd_reset")->unique()->nullable();

            $table->timestamp("email_verified_at")->nullable();
        });

        Schema::create("app_user", function (Blueprint $table): void {
            $table->id();

            $table->integer("sys_user_id")->unsigned();

            $table->string("email", 100)->nullable();
            $table->string("first_name", 50)->nullable();
            $table->string("first_surname", 50)->nullable();
            $table->string("mobile_number", 100)->nullable();
            $table->string("middle_name", 50)->nullable();
            $table->string("second_surname", 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("app_user");
        Schema::dropIfExists("sys_user");
    }
};

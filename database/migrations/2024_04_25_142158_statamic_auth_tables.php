<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatamicAuthTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'super')) {
                $table->boolean('super')->default(false);
            }
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable();
            }
            if (!Schema::hasColumn('users', 'preferences')) {
                $table->json('preferences')->nullable();
            }
            if (!Schema::hasColumn('users', 'last_login')) {
                $table->timestamp('last_login')->nullable();
            }
            if (Schema::hasColumn('users', 'password')) {
                $table->string('password')->nullable()->change();
            }
        });

        if (!Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->string('role_id');
            });
        }

        if (!Schema::hasTable('group_user')) {
            Schema::create('group_user', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->string('group_id');
            });
        }

        if (!Schema::hasTable('password_activation_tokens')) {
            Schema::create('password_activation_tokens', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'super')) {
                $table->dropColumn('super');
            }
            if (Schema::hasColumn('users', 'avatar')) {
                $table->dropColumn('avatar');
            }
            if (Schema::hasColumn('users', 'preferences')) {
                $table->dropColumn('preferences');
            }
            if (Schema::hasColumn('users', 'last_login')) {
                $table->dropColumn('last_login');
            }
            if (Schema::hasColumn('users', 'password')) {
                $table->string('password')->nullable(false)->change();
            }
        });

        Schema::dropIfExists('role_user');
        Schema::dropIfExists('group_user');
        Schema::dropIfExists('password_activation_tokens');
    }
}

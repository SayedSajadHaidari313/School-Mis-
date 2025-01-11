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
    Schema::table('customers', function (Blueprint $table) {
        // بررسی وجود ستون‌ها قبل از حذف
        if (Schema::hasColumn('customers', 'email')) {
            $table->dropColumn('email');
        }

        if (Schema::hasColumn('customers', 'password')) {
            $table->dropColumn('password');
        }

        if (Schema::hasColumn('customers', 'name')) {
            $table->dropColumn('name');
        }

        // اضافه کردن کالم user_id
        // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            // بررسی وجود کالم‌ها قبل از حذف
            if (Schema::hasColumn('customers', 'email')) {
                $table->string('email')->unique();
            }

            if (Schema::hasColumn('customers', 'password')) {
                $table->string('password');
            }

            if (Schema::hasColumn('customers', 'name')) {
                $table->string('name');
            }

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

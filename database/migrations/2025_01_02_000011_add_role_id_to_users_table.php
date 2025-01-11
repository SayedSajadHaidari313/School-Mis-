<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable(); // افزودن ستون role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null'); // تنظیم کلید خارجی
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']); // حذف کلید خارجی
            $table->dropColumn('role_id'); // حذف ستون role_id
        });
    }
};

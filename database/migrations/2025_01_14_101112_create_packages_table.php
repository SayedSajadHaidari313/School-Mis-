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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('disk_space_quota')->nullable(); // فضای دیسک (MB)
            $table->string('bandwidth_limit')->nullable();  // پهنای باند ماهانه (MB)
            $table->string('max_ftp_accounts')->nullable(); // حداکثر حساب FTP
            $table->string('max_email_accounts')->nullable(); // حداکثر حساب ایمیل
            $table->string('max_sql_databases')->nullable(); // حداکثر دیتابیس‌های SQL
            $table->string('max_sub_domains')->nullable();   // حداکثر زیردامنه‌ها
            $table->string('max_parked_domains')->nullable(); // حداکثر دامنه‌های پارک‌شده
            $table->string('max_addon_domains')->nullable();  // حداکثر دامنه‌های افزوده
            $table->string('max_mailing_lists')->nullable();  // حداکثر لیست ایمیل
            $table->string('max_passenger_apps')->nullable(); // حداکثر اپلیکیشن‌های Passenger
            $table->string('max_hourly_email')->nullable();   // حداکثر ایمیل‌های ساعتی
            $table->string('max_email_quota_per_address')->nullable(); // حداکثر فضای ایمیل برای هر آدرس
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

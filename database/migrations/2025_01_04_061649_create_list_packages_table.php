<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('list_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('disk_space_quota')->nullable(); // فضای دیسک (MB)
            $table->integer('bandwidth_limit')->nullable();  // پهنای باند ماهانه (MB)
            $table->integer('max_ftp_accounts')->nullable(); // حداکثر حساب FTP
            $table->integer('max_email_accounts')->nullable(); // حداکثر حساب ایمیل
            $table->integer('max_sql_databases')->nullable(); // حداکثر دیتابیس‌های SQL
            $table->integer('max_sub_domains')->nullable();   // حداکثر زیردامنه‌ها
            $table->integer('max_parked_domains')->nullable(); // حداکثر دامنه‌های پارک‌شده
            $table->integer('max_addon_domains')->nullable();  // حداکثر دامنه‌های افزوده
            $table->integer('max_mailing_lists')->nullable();  // حداکثر لیست ایمیل
            $table->integer('max_passenger_apps')->nullable(); // حداکثر اپلیکیشن‌های Passenger
            $table->integer('max_hourly_email')->nullable();   // حداکثر ایمیل‌های ساعتی
            $table->integer('max_email_quota_per_address')->nullable(); // حداکثر فضای ایمیل برای هر آدرس
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_packages');
    }
};

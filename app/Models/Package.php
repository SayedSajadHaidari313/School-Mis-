<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'disk_space_quota',
        'bandwidth_limit',
        'max_ftp_accounts',
        'max_email_accounts',
        'max_sql_databases',
        'max_sub_domains',
        'max_parked_domains',
        'max_addon_domains',
        'max_mailing_lists',
        'max_passenger_apps',
        'max_hourly_email',
        'max_email_quota_per_address',
    ];
}

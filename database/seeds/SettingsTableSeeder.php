<?php

use \App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'name' => 'site_name',
            'value' => 'Site name',
            'description' => 'site name header',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_description',
            'value' => 'description blog',
            'description' => 'description',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_keywords',
            'value' => 'keyword, keyword1',
            'description' => 'keywords',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_url',
            'value' => 'http://localhost/',
            'description' => 'site url',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'admin_id',
            'value' => '1',
            'description' => 'admin user id',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'bei_an',
            'value' => 'author name',
            'description' => 'author name',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'statistic_code',
            'value' => '',
            'description' => 'statistic',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'cdn_domain',
            'value' => 'http://localhost',
            'description' => 'cdn domain',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'cdn_on',
            'value' => '0',
            'description' => 'enable or disable cdn',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'page_size',
            'value' => '8',
            'description' => 'default page size',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'expire',
            'value' => '1',
            'description' => 'expire',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'comment_on',
            'value' => '1',
            'description' => 'on or off comments',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'register_on',
            'value' => '0',
            'description' => 'on or off registrations',
            'type' => 'text',
        ]);
    }
}

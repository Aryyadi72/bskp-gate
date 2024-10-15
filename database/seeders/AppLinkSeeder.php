<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppLink;

class AppLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppLink::insert([
            [
                'name' => 'BSKP Salary',
                'url' => 'http://192.168.99.202/salary/public',
                'slug' => 'bskp-salary',
                'color' => 'success',
            ],
            [
                'name' => 'BSKP Attendance Management',
                'url' => 'http://192.168.99.202/absen/public',
                'slug' => 'bskp-attendance-management',
                'color' => 'cyan',
            ],
            [
                'name' => 'BSKP KPI',
                'url' => 'http://192.168.99.202/kpi/public',
                'slug' => 'bskp-kpi',
                'color' => null,
            ],
            [
                'name' => 'BSKP Zen-z-Zai',
                'url' => 'http://192.168.99.202/zen-z-zai/public',
                'slug' => 'bskp-zen-z-zai',
                'color' => null,
            ],
            [
                'name' => 'BSKP SOP',
                'url' => 'http://192.168.99.202/doc-app/public',
                'slug' => 'bskp-sop',
                'color' => null,
            ],
            [
                'name' => 'BSKP MAP',
                'url' => 'http://192.168.99.202/soilcondition/s/public',
                'slug' => 'bskp-map',
                'color' => null,
            ],
            [
                'name' => 'Nextcloud',
                'url' => 'http://192.168.99.202/nextcloud',
                'slug' => 'nextcloud',
                'color' => null,
            ],
            [
                'name' => 'BSKP Production',
                'url' => 'http://192.168.99.202/daily-new/public',
                'slug' => 'bskp-production',
                'color' => null,
            ],
        ]);
    }
}

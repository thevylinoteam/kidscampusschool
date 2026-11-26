<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KidsCampusSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {
            $organization = Organization::firstOrCreate(
                ['code' => 'KCBHOPAL'],
                ['name' => 'Kids Campus School', 'email' => 'info@kidscampusbhopal.com', 'phone' => '+919424442233', 'address' => '182-Sarvdharm C-Sector, Opposite Beema Kunj, Kolar Road, Bhopal, Madhya Pradesh 462042']
            );

            foreach ([
                ['code' => 'KCMAIN', 'name' => 'Kids Campus - Main Branch', 'address' => '182-Sarvdharm C-Sector, Opposite Beema Kunj, Kolar Road', 'initials' => 'KCM'],
                ['code' => 'KCBANJARI', 'name' => 'Kids Campus - Banjari Branch', 'address' => '50-Good Shepherd Colony, near Croma, Banjari, Kolar Road', 'initials' => 'KCB'],
            ] as $branch) {
                School::firstOrCreate(
                    ['organization_id' => $organization->id, 'code' => $branch['code']],
                    array_merge($branch, ['city' => 'Bhopal', 'state' => 'Madhya Pradesh', 'country' => 'India', 'postal_code' => '462042', 'timezone' => 'Asia/Kolkata', 'email' => 'info@kidscampusbhopal.com', 'phone' => '+919424442233'])
                );
            }
        });
    }
}

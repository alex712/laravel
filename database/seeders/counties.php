<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class counties extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();
        Schema::enableForeignKeyConstraints();

        $counties = [
            ['code' => 'AB', 'name' => 'Alba'],
            ['code' => 'AG', 'name' => 'Argeș'],
            ['code' => 'AR', 'name' => 'Arad'],
            ['code' => 'B', 'name' => 'București'],
            ['code' => 'BC', 'name' => 'Bacău'],
            ['code' => 'BH', 'name' => 'Bihor'],
            ['code' => 'BN', 'name' => 'Bistrița Năsăud'],
            ['code' => 'BR', 'name' => 'Brăila'],
            ['code' => 'BT', 'name' => 'Botoșani'],
            ['code' => 'BV', 'name' => 'Brașov'],
            ['code' => 'BZ', 'name' => 'Buzău'],
            ['code' => 'CJ', 'name' => 'Cluj'],
            ['code' => 'CL', 'name' => 'Călărași'],
            ['code' => 'CS', 'name' => 'Caraș-Severin'],
            ['code' => 'CT', 'name' => 'Constanța'],
            ['code' => 'CV', 'name' => 'Covasna'],
            ['code' => 'DB', 'name' => 'Dâmbovița'],
            ['code' => 'DJ', 'name' => 'Dolj'],
            ['code' => 'GJ', 'name' => 'Gorj'],
            ['code' => 'GL', 'name' => 'Galați'],
            ['code' => 'GR', 'name' => 'Giurgiu'],
            ['code' => 'HD', 'name' => 'Hunedoara'],
            ['code' => 'HR', 'name' => 'Harghita'],
            ['code' => 'IF', 'name' => 'Ilfov'],
            ['code' => 'IL', 'name' => 'Ialomița'],
            ['code' => 'IS', 'name' => 'Iași'],
            ['code' => 'MH', 'name' => 'Mehedinți'],
            ['code' => 'MM', 'name' => 'Maramureș'],
            ['code' => 'MS', 'name' => 'Mureș'],
            ['code' => 'NT', 'name' => 'Neamț'],
            ['code' => 'OT', 'name' => 'Olt'],
            ['code' => 'PH', 'name' => 'Prahova'],
            ['code' => 'SB', 'name' => 'Sibiu'],
            ['code' => 'SJ', 'name' => 'Sălaj'],
            ['code' => 'SM', 'name' => 'Satu-Mare'],
            ['code' => 'SV', 'name' => 'Suceava'],
            ['code' => 'TL', 'name' => 'Tulcea'],
            ['code' => 'TM', 'name' => 'Timiș'],
            ['code' => 'TR', 'name' => 'Teleorman'],
            ['code' => 'VL', 'name' => 'Vâlcea'],
            ['code' => 'VN', 'name' => 'Vrancea'],
            ['code' => 'VS', 'name' => 'Vaslui'],

        ];

        DB::table('counties')->insert($counties);
    }
}

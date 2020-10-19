<?php

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    protected $regions = [
        [
            'code' => 'I',
            'name' => 'Ilocos Region',
        ],
        [
            'code' => 'II',
            'name' => 'Cagayan Valley',
        ],
        [
            'code' => 'III',
            'name' => 'Central Luzon',
        ],
        [
            'code' => 'IV-A',
            'name' => 'CALABARZON',
        ],
        [
            'code' => 'IV-B',
            'name' => 'MIMAROPA',
        ],
        [
            'code' => 'V',
            'name' => 'Bicol Region',
        ],
        [
            'code' => 'VI',
            'name' => 'Western Visayas',
        ],
        [
            'code' => 'VII',
            'name' => 'Central Visayas',
        ],
        [
            'code' => 'VIII',
            'name' => 'Eastern Visayas',
        ],
        [
            'code' => 'IX',
            'name' => 'Zamboanga Peninsula',
        ],
        [
            'code' => 'X',
            'name' => 'Northern Mindanao',
        ],
        [
            'code' => 'XI',
            'name' => 'Davao Region',
        ],
        [
            'code' => 'XII',
            'name' => 'Soccsksargen',
        ],
        [
            'code' => 'XIII',
            'name' => 'Caraga Region',
        ],
        [
            'code' => 'CAR',
            'name' => 'Cordillera Administrative Region',
        ],
        [
            'code' => 'BARMM',
            'name' => 'Bangsamoro Autonomous Region in Muslim Mindanao',
        ],
        [
            'code' => 'NCR',
            'name' => 'National Capital Region',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->regions as $key => $region):
            $data = [
                'code' => $region['code'],
                'name' => $region['name'],
            ];

            \DB::beginTransaction();
                Region::create($data);
            \DB::commit();
        endforeach;
    }
}

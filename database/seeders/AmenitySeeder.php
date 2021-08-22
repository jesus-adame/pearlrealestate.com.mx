<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenity::insert([
            [
                'slug' => 'kitchen',
                'name' => 'Cocina',
            ],
            [
                'slug' => 'leaving_room',
                'name' => 'Sala',
            ],
            [
                'slug' => 'fireplace',
                'name' => 'Chimenea',
            ],
            [
                'slug' => 'pool',
                'name' => 'Alberca',
            ],
            [
                'slug' => 'jacizzi',
                'name' => 'Jacuzzi',
            ],
            [
                'slug' => 'laundry_room',
                'name' => 'Cuarto de lavado',
            ],
            [
                'slug' => 'cistern',
                'name' => 'Cisterna',
            ],
            [
                'slug' => 'terrace',
                'name' => 'Terraza',
            ],
            [
                'slug' => 'firepit',
                'name' => 'Firepit',
            ],
        ]);
    }
}

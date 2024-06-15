<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $photo = new Photo();
            $photo->title = $faker->words(5, true);
            $photo->description = $faker->paragraphs(5, true);
            $photo->image = $faker->imageUrl(640, 400, 'photos', true, $photo->title, false, 'jpg');
            $photo->category = $faker->words(1, true);
            $photo->priority = $faker->boolean(50);
            $photo->save();
        }
    }
}

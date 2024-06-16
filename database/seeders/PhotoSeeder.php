<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
            $photo = new Photo();
            $photo->title = $faker->words(5, true);
            $photo->slug = Str::slug($photo->title, '-');
            $photo->description = $faker->paragraphs(5, true);
            $photo->image = $faker->imageUrl(640, 400, 'photos', true, $photo->title, false, 'jpg');
            $photo->category_id = $faker->numberBetween(1, 5);
            $photo->priority = $faker->boolean(50);
            $photo->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Вызов сидера отдельно
        // php artisan db:seed --class=PostSeeder

        $posts = [];

        for ($i = 0; $i < 5; $i++) {
            $posts[] = [
                'user_id' => random_int(1001, 1018),
                'title' => fake()->sentence(),
                'content' => fake()->paragraph(),
                'published_at' => new Carbon(fake()->dateTimeBetween(now()->subYear(), now())),
                'published' => boolval(random_int(0, 1)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::connection('my_database')->table('posts')->insert($posts);
    }
}

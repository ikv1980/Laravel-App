<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PostSeeder::class,
            // другие сидеры...
        ]);

        // Временное переключение подключения
        config(['database.default' => 'lara_app']);
        // Теперь все запросы будут использовать lara_app
        User::factory(10)->create();
        // Вернуть обратно (если нужно)
        config(['database.default' => 'my_database']);

//        User::factory()->create([
//            'name' => 'TestFacade User',
//            'email' => 'test@example.com',
//        ]);
    }
}

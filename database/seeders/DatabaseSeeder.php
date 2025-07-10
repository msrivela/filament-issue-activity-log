<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\SubItem;
use App\Models\SubSubItem;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@filamentphp.com',
        ]);

        Item::factory(5)
            ->has(
                SubItem::factory(5)
                    ->has(SubSubItem::factory(5))
            )
            ->create();
    }
}

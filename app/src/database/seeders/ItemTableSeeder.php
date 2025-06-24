<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create(['name' => '勇者の剣', 'type' => 'sword', 'explanation' => '勇者のみが持てるとされる剣']);
    }
}

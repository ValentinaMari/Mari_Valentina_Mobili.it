<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tags = ['BestBuy', 'Natale','Occasioni','UltimoPezzo'];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag

            ]); 
        }
    }
}

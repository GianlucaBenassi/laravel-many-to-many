<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["Meat", "Fish", "Gluten free", "Lactose free", "Vegetarian", "Vegan"];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($newTag->name)->slug("-");
            $newTag->save();
        }

    }
}

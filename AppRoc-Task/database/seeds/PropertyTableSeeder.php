<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('properties')->insert([
[
    'id' => 1,
    'name' => 'Color',
    'category_id'=>1,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

], [
    'id' => 2,
    'name' => 'Ram',
    'category_id'=>1,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 3,
    'name' => 'Memory',
    'category_id'=>1,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 4,
    'name' => 'Camera',
    'category_id'=>1,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 5,
    'name' => 'Power',
    'category_id'=>2,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 6,
    'name' => 'mA',
    'category_id'=>2,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 7,
    'name' => 'Color',
    'category_id'=>3,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 8,
    'name' => 'Martial',
    'category_id'=>3,
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

]
]);

    }
}

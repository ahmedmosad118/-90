<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
[
    'id' => 1,
    'name' => 'Mobiles',
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

], [
    'id' => 2,
    'name' => 'Battery charger',
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

],
[
    'id' => 3,
    'name' => 'mobile accessories ',
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

]
]);

    }
}

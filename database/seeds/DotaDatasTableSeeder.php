<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\File as IlluminateFile;

class DotaDatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = IlluminateFile::get(database_path('data/items.json'));
        //dd($json);

        DB::table('dota_data')->insert([
             'items' => $json,
        ]);
    }
}

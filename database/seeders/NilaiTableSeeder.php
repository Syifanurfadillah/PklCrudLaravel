<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            ['nis'=> 1005,'kode_mapel'=>'B4141','nilai'=>90,'grade'=>''], 
        ];

        DB::table('nilai')->insert($table);
    }
}

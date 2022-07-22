<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $table = [
            ['kode_mapel' => 1005 , 'nama_mapel' => 'logika informatika','semester'=> 4 ,'jurusan' => 'IT'], 
        ];

        DB::table('jurusan')->insert($table);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DataSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            ['nis'=> 1005,'nama_siswa'=>'Syfa','alamat_siswa'=>'kp.pasawahan','tanggal_lahir'=>'2004-11-04'], 
        ];

        DB::table('datasiswa')->insert($table);
    }
}

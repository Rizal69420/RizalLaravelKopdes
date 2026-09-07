<?php

namespace Database\Seeders;

use illuminate\Database\console\Seeds\WithoutModelEvents;
use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('manager')->insert([
            [
                'foto_manager'          => 'Seeder/rizz.jpg',
                'nama_manager'          => 'Rizz Al',
                'tanggal_lahir'         => '2001/11/9',
                'jenis_kelamin'         => 'Pria',
                'alamat_manager'        => 'Mars',
                'pendidikan_terakhir'   => 'S69 Streamer University',
            ],
            [
                'foto_manager'          => 'Seeder/hugh.png',
                'nama_manager'          => 'Hugh Jass',
                'tanggal_lahir'         => '1969/9/6',
                'jenis_kelamin'         => 'Pria',
                'alamat_manager'        => 'North Korea',
                'pendidikan_terakhir'   => 'Waterloo University',
            ],
            [
                'foto_manager'          => 'Seeder/mona.jpg',
                'nama_manager'          => 'Mona Lisa',
                'tanggal_lahir'         => '1479/6/15',
                'jenis_kelamin'         => 'Wanita',
                'alamat_manager'        => 'Italy',
                'pendidikan_terakhir'   => 'IDK',
            ],  
            [
                'foto_manager'          => 'Seeder/john.jpg',
                'nama_manager'          => 'John In Doe Knee Sya',
                'tanggal_lahir'         => '1945/9/17',
                'jenis_kelamin'         => 'Pria',
                'alamat_manager'        => 'Mapa Jahit',
                'pendidikan_terakhir'   => 'Somewhere',
            ],
            [
                'foto_manager'          => 'Seeder/jane.jpg',
                'nama_manager'          => 'Jane Tea More lays They (without the "y" sound at the end)',
                'tanggal_lahir'         => '2002/5/20',
                'jenis_kelamin'         => 'Wanita',
                'alamat_manager'        => 'A Specific Island',
                'pendidikan_terakhir'   => 'Squidward Community College',
            ],
            
        ]);
    }
}
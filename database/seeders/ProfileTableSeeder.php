<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('profiles')->insert([
            [
                'username'=> 'akun_baru',
                'first_name'=> 'mimin',
                'last_name'=> 'ganteng',
                'city'=> 'Bandung',
                'state'=> 'Indonesia',
                'zip_code'=> '28114',
                'address'=> 'Jalan SUkarajin',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

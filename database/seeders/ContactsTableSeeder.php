<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'fullname' => '田中太郎',
            'gender' => 1,
            'email' => 'hoge@gmail.com',
            'postcode' => '110-0005',
            'address' => '東京都台東区上野1-2-3',
            'building_name' => '上野マンション101',
            'opinion' => 'よろしくお願いいたします。',
        ];
        DB::table('contacts')->insert($param);
    }
}

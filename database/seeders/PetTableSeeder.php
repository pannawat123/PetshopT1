<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet')->insert(
            array(
                [
                    'petname' => 'ชิวาวา',
                    'gender' => 'ผู้',
                    'pettype_id' => 1,
                    'price' => 11900,
                ],

                [
                    'petname' => 'ปอม',
                    'gender' => 'เมีย', 
                    'pettype_id' => 1,
                    'price' => 11900,
                ],

                [
                    'petname' => 'สก็อตติซ',
                    'gender' => 'ผู้',
                    'pettype_id' => 2,
                    'price' => 11900,
                ],

                [
                    'petname' => 'แฮมสเตอร์',
                    'gender' => 'เมีย',
                    'pettype_id' => 3,
                    'price' => 11900,
                ]
            
        ));
    }
}

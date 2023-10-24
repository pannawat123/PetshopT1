<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pettype')->insert(
            array(
                [
                    'type_pet' => 'สุนัข'
                ],

                [
                    'type_pet' => 'แมว'
                ],

                [
                    'type_pet' => 'หนู'
                ]
            ));
    }
}

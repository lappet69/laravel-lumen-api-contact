<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "John",
                'phone' => '088291299126',
                'email' => 'john@gmail.com',
                'address' => "Jalan Sekitar Indonesia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'name' => "Michael",
                'phone' => '087379193821',
                'email' => "mike@gmail.com",
                'address' => "Jalan Dua arah No 17",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Jackson",
                'phone' => '087379193821',
                'email' => 'jakson@gmail.com',
                'address' => "Jalan Buntu No 17",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Panca",
                'phone' => '087379193821',
                'email' => 'panca@gmail.com',
                'address' => "Jalan Pancasila No 1",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Boden",
                'phone' => '087379193821',
                'email' => 'boden@gmail.com',
                'address' => "Jalan Pramuka No 8",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => "Powel",
                'phone' => '087379193821',
                'email' => 'powel@gmail.com',
                'address' => "Jalan Pramuka No 14",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('contacts')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contents')->insert([
            [
                'title' => 'Học PHP',
                'author' => 1,
                'level' => 1,
                'start_date' => \Carbon\Carbon::createFromDate(2020, 3, 3)->toDateTimeString(),
                    'end_date'=> \Carbon\Carbon::createFromDate(2020, 3, 5)->toDateTimeString(),
                'group_id'=>1,
                'content' =>'AAAAAAAAAAAAAAAAAAAAAAAAAaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsa'
            ],
            [
                'title' => 'Học JAVA',
                'author' => 3,
                'level' => 2,
                'start_date' => \Carbon\Carbon::createFromDate(2020, 3, 3)->toDateTimeString(),
                'end_date'=> \Carbon\Carbon::createFromDate(2020, 3, 1)->toDateTimeString(),
                'group_id'=>1,
                'content' =>'NADDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDĐ'
            ],
            [
                'title' => 'Học JS',
                'author' => 7,
                'level' => 2,
                'start_date' => \Carbon\Carbon::createFromDate(2020, 3, 3)->toDateTimeString(),
                'end_date'=> \Carbon\Carbon::createFromDate(2020, 3, 7)->toDateTimeString(),
                'group_id'=>1,
                'content' =>'mmlmdvadplpljicadlchabdcnacdbkgdackbhkcdnasccdahdncycnhranagcbmanhdshasncbgrynamxaksadhdadakldhda
                dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsa'
            ]


        ]);
    }
}

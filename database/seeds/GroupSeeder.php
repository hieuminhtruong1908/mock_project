<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { DB::table('groups')->insert([
        ['name' => 'phpaaa', 'slug' => 'phpAa', 'description' => 'group phpLOLK', 'creator' => 10, 'course_id' => 1, 'start_date' => \Carbon\Carbon::createFromDate(2020,3,1)->toDateTimeString()],
        ['name' => 'javabba', 'slug' => 'javaAa', 'description' => 'group javaAa', 'creator' => 11, 'course_id' => 6, 'start_date' => \Carbon\Carbon::createFromDate(2020,01,27)->toDateTimeString()],
        ['name' => 'jsxxaa','slug' => 'jsAa', 'description' => 'group jsAa', 'creator' => 12, 'course_id' => 2, 'start_date' => \Carbon\Carbon::createFromDate(2020,02,25)->toDateTimeString()],
        ['name' => 'jsaaxa','slug' => 'jsBa', 'description' => 'group jsBa', 'creator' => 13, 'course_id' => 2, 'start_date' => \Carbon\Carbon::createFromDate(2020,02,17)->toDateTimeString()],
        ['name' => 'phplopa','slug' => 'phpNM', 'description' => 'group phpNM', 'creator' => 14, 'course_id' => 1, 'start_date' => \Carbon\Carbon::createFromDate(2020,02,15)->toDateTimeString()],
        ['name' => 'javaikh','slug' => 'javaVB', 'description' => 'javaVB', 'creator' => 15, 'course_id' => 6, 'start_date' => \Carbon\Carbon::createFromDate(2020,01,24)->toDateTimeString()],
        ['name' => 'phplca','slug' => 'phpXCX', 'description' => 'phpXCX', 'creator' => 5, 'course_id' => 1, 'start_date' => \Carbon\Carbon::createFromDate(2020,01,2)->toDateTimeString()],
        ['name' => 'phpqrw','slug' => 'phpRTY ', 'description' => 'group phpRTY', 'creator' => 6, 'course_id' => 5, 'start_date' => \Carbon\Carbon::createFromDate(2020,02,14)->toDateTimeString()],
        ['name' => 'phppla','slug' => 'phpLOLK', 'description' => 'group phpLOLK', 'creator' => 7, 'course_id' => 5, 'start_date' => \Carbon\Carbon::createFromDate(2020,02,25)->toDateTimeString()],
    ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['name' => 'hieu', 'email' => 'aaa@ntq-solution.com.vn'],
            ['name' => 'linh', 'email' => 'dddddd@ntq-solution.com.vn'],
            ['name' => 'xuân huấn','email' => 'đasadxxasxas@ntq-solution.com.vn'],
            ['name' => 'việt hà','email' => 'yukiouio@ntq-solution.com.vn'],
            ['name' => 'hieu 1', 'email' => 'poue@ntq-solution.com.vn'],
            ['name' => 'linh 1', 'email' => 'lmir@ntq-solution.com.vn'],
            ['name' => 'xuân huấn 1','email' => 'fse@ntq-solution.com.vn'],
            ['name' => 'việt hà 2','email' => 'opl@ntq-solution.com.vn'],
            ['name' => 'hieu 3', 'email' => 'mnbv@ntq-solution.com.vn'],
            ['name' => 'linh 4', 'email' => 'cvbn@ntq-solution.com.vn'],
            ['name' => 'xuân huấn 4','email' => 'dvgf@ntq-solution.com.vn'],
            ['name' => 'việt hà 5','email' => 'ulpg@ntq-solution.com.vn'],
            ['name' => 'hieu 5', 'email' => 'zxsa@ntq-solution.com.vn'],
            ['name' => 'linh x', 'email' => 'aqzxc@ntq-solution.com.vn'],
            ['name' => 'xuân huấn vad','email' => 'dfthv@ntq-solution.com.vn'],
            ['name' => 'việt hà lodoa','email' => 'plohtd@ntq-solution.com.vn']

        ]);
    }
}

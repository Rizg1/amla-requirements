<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'NEW',],
            ['id' => 2, 'name' => 'RENEWED',],
            ['id' => 3, 'name' => 'UNRENEWED',],
            ['id' => 4, 'name' => 'PRE-TERMINATED',],
            ['id' => 5, 'name' => 'TERMINATED',],
            ['id' => 6, 'name' => 'SUSPENDED',]
        ];
        foreach ($items as $item) {
            \App\Status::create($item);
        }
    }
}

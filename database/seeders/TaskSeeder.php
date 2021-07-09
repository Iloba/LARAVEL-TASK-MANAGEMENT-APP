<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        //
        DB::table('tasks')->insert([
            'task_name' => Str::random(10),
            'priority' => Str::random(20),
            'project_id' => 1
            
        ]);
    }
}

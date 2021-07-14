<?php

use Illuminate\Database\Seeder;
use App\Upcoming;
use Illuminate\Support\Str;
class UpcomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0;$i<5;$i++){
            Upcoming::create([
                'completed' => false,
                'title' => $faker->sentence($nbWords = 4, $varialbeWords = false),
                'approved' => false,
                'waiting' => true,
                'taskId' => Str::random(10),
                'code_id' => 1,
            ]);
        }
    }
}

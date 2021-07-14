<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Code;
class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0;$i<5;$i++){
            Code::create([
                'qr_code' => Str::random(5),
            ]);
        }
    }
}

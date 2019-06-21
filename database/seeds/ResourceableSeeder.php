<?php

use App\Resourceable;
use Illuminate\Database\Seeder;

class ResourceableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resourceable::class, 10)->create();
    }
}
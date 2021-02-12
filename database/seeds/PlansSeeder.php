  
<?php

use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Plan::class, 1)->create([
            'name' => 'Free',
        ]);
        factory(App\Models\Plan::class, 1)->create([
            'name' => 'Full',
        ]);
    }
}

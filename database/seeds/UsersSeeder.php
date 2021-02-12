  
<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 1)->create([
            'email'     => 'nixlovemi@gmail.com',
            'phone'     => null,
            'cellphone' => '(19) 98132-4148',
            'confirmed' => true
        ]);
        factory(App\Models\User::class, 9)->create();
    }
}

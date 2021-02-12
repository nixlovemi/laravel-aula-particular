  
<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers = User::all();
        foreach ($allUsers as $User) {
            factory(App\Models\UserPlan::class, 1)->create([
                "user_id" => $User->id
            ]);
        }
    }
}

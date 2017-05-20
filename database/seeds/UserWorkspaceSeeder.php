<?php

use Illuminate\Database\Seeder;
use App\User;

class UserWorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=4;$i++){
            $user=User::all()->find($i);
            for ($j=0;$j<5;$j++){
                $user->workspaces()->attach($j,['rate'=> rand(0, 500) / 100 ]) ;
            }
        }
    }
}

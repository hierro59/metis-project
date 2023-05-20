<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\HasTeams;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    use HasTeams;
    public function run(): void
    {
        
        $users = [
            [
                'name' => 'IamGod',
                'email' => 'hierro59@gmail.com',
                'password' => 'Atunis2716.',
                'role' => 'super admin',
            ]
        ];

        foreach($users as $user) {
            
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]); 
            $this->createTeam($created_user);
            $created_user->assignRole($user['role']);
        }
        
    }

    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
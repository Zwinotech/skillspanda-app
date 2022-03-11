<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Kyle',
            'lastname' => 'Mabaso',
            'username' => 'Onmipotent',
            'gender' => 'male',
            'email' => 'admin@zwinotech.co.za',
            'password' => bcrypt('kH3nsy0914!'),
            'active' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

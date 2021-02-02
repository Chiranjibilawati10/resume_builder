<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Chiranjibi Lawati', 
            'email' => 'superAdmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'active' => 1,
        ]);

        $role = Role::create(['name' => 'superAdmin']);
        $permissions = Permission::pluck('id','id')->all();
        
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}

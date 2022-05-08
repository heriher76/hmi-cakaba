<?php
  
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Heri Hermawan', 
            'email' => 'admin@hmicakaba.com',
            'password' => bcrypt('heri1995')
        ]);
  
        $role = Role::create(['name' => 'super-admin']);
   
        $user->assignRole([$role->id]);
        
        //////////////////////////////////////////

        $user = User::create([
            'name' => 'Admin BPL', 
            'email' => 'admin-bpl@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'admin-bpl']);
   
        $user->assignRole([$role->id]);

        //////////////////////////////////////////

        $user = User::create([
            'name' => 'Admin Cabang', 
            'email' => 'admin-cabang@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'admin-cabang']);
   
        $user->assignRole([$role->id]);

        //////////////////////////////////////////

        $user = User::create([
            'name' => 'Admin Komisariat', 
            'email' => 'admin-komisariat@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'admin-komisariat']);
   
        $user->assignRole([$role->id]);

        //////////////////////////////////////////

        $user = User::create([
            'name' => 'KAHMI', 
            'email' => 'kahmi@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'kahmi']);
   
        $user->assignRole([$role->id]);

        //////////////////////////////////////////

        $user = User::create([
            'name' => 'Kader HMI', 
            'email' => 'kader@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'kader']);
   
        $user->assignRole([$role->id]);

        //////////////////////////////////////////

        $user = User::create([
            'name' => 'Publik', 
            'email' => 'publik@hmicakaba.com',
            'password' => bcrypt('password')
        ]);
  
        $role = Role::create(['name' => 'publik']);
   
        $user->assignRole([$role->id]);
    }
}
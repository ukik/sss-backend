<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
# php artisan db:seed --class=PermissionTableSeeder


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
        ];
     
        foreach ($permissions as $permission) {
            // dd($permission);
             Permission::create(['name' => $permission]);
        }
    }
}
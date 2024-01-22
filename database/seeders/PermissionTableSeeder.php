<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
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
           'product-delete',
           'project-list',
           'project-create',
           'project-edit',
           'project-delete',
           'task-list',
           'task-create',
           'task-edit',
           'task-delete',
           'affectation-list',
           'affectation-create',
           'affectation-edit',
           'affectation-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

////////php artisan make:seeder PermissionTableSeeder

////php artisan db:seed --class=PermissionTableSeeder
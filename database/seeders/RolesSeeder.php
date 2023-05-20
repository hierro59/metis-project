<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_super_admin = Role::create(['name' => 'super admin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);
        $role_learner = Role::create(['name' => 'learner']);
        $role_teacher = Role::create(['name' => 'teacher']);
        $role_curator = Role::create(['name' => 'curator']);
        $role_support = Role::create(['name' => 'support']);
        $role_api = Role::create(['name' => 'api']);

        $permission_read_articles = Permission::create(['name' => 'read articles']);
        $permission_edit_articles = Permission::create(['name' => 'edit articles']);
        $permission_write_articles = Permission::create(['name' => 'write articles']);
        $permission_delete_articles = Permission::create(['name' => 'delete articles']);

        $permission_read_roles = Permission::create(['name' => 'read roles']);
        $permission_edit_roles = Permission::create(['name' => 'edit roles']);
        $permission_write_roles = Permission::create(['name' => 'write roles']);
        $permission_delete_roles = Permission::create(['name' => 'delete roles']);

        $permission_read_users = Permission::create(['name' => 'read users']);
        $permission_edit_users = Permission::create(['name' => 'edit users']);
        $permission_write_users = Permission::create(['name' => 'write users']);
        $permission_delete_users = Permission::create(['name' => 'delete users']);

        $permission_read_learners = Permission::create(['name' => 'read learners']);
        $permission_edit_learners = Permission::create(['name' => 'edit learners']);
        $permission_write_learners = Permission::create(['name' => 'write learners']);
        $permission_delete_learners = Permission::create(['name' => 'delete learners']);

        $permission_read_api = Permission::create(['name' => 'read api']);
        $permission_edit_api = Permission::create(['name' => 'edit api']);
        $permission_write_api = Permission::create(['name' => 'write api']);
        $permission_delete_api = Permission::create(['name' => 'delete api']);

        $permissions_super_admin = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles, 
            $permission_delete_articles,
            $permission_read_roles,
            $permission_edit_roles,
            $permission_write_roles,
            $permission_delete_roles,
            $permission_read_users,
            $permission_edit_users,
            $permission_write_users,
            $permission_delete_users,
            $permission_read_learners,
            $permission_edit_learners,
            $permission_write_learners,
            $permission_delete_learners,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api,
            $permission_delete_api
        ];

        $permissions_admin = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles,
            $permission_read_roles,
            $permission_edit_roles,
            $permission_write_roles,
            $permission_read_users,
            $permission_edit_users,
            $permission_write_users,
            $permission_read_learners,
            $permission_edit_learners,
            $permission_write_learners
        ];

        $permissions_standard = [
            $permission_read_articles,
            $permission_read_roles,
            $permission_read_users,
            $permission_read_learners,
        ];

        $permissions_learner = [
            $permission_read_articles,
        ];

        $permissions_teacher = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles
        ];

        $permissions_curator = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles
        ];

        $permissions_support = [
            $permission_read_articles, 
            $permission_edit_articles,
            $permission_read_learners,
            $permission_edit_learners,
            $permission_write_learners
        ];

        $permissions_api = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles,
            $permission_read_learners,
            $permission_edit_learners,
            $permission_write_learners
        ];

        $role_super_admin->syncPermissions($permissions_super_admin);
        $role_admin->givePermissionTo($permissions_admin);
        $role_standard->givePermissionTo($permissions_standard);
        $role_learner->givePermissionTo($permissions_learner);
        $role_teacher->givePermissionTo($permissions_teacher);
        $role_curator->givePermissionTo($permissions_curator);
        $role_support->givePermissionTo($permissions_support);
        $role_api->givePermissionTo($permissions_api);
    }
}

<?php


namespace App\Helpers;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function getRoles()
    {
        $defaultSystemVars = getVar('system');
        if (Role::whereName('Admin')->first() === null && Role::whereName('Member')->first() === null) {
            foreach ($defaultSystemVars['default_role'] as $value) {
                Role::create([
                    'name' => $value['name'],
                    'guard_name' => $value['guard_name'],
                    'is_main' => $value['is_main'],
                    'admin_panel_access' => $value['admin_panel_access'],
                    'description' => $value['description']
                ]);
            }
        }
    }

    public static function getPermissions()
    {
        $adminRole = Role::findByName('Admin');
        $defaultSystemVars = getVar('system');
        foreach ($defaultSystemVars['default_permission'] as $value) {
            if (Permission::whereName($value['name'])->first() === null) {
                $permission = Permission::create([
                    'name' => $value['name'],
                    'guard_name' => $value['guard_name'],
                    'is_main' => $value['is_main'],
                ]);
                $adminRole->givePermissionTo($permission['name']);
            }
        }
    }

    public static function assignRolePermissions()
    {

    }

    public static function getInfo()
    {
        $info = getVar('info');
        return [
            'roles' => $info['roles'],
            'permissions' => $info['permissions']
        ];
    }
}

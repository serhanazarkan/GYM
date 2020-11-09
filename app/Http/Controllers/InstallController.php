<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InstallController extends Controller
{
    public function index(){
        return view('install.index');
    }
    /*
    public function add_roles(){
        $defaultSystemVars = getVar('system');
        foreach ($defaultSystemVars['default_role'] as $value) {
            Role::create([
                'name' => $value['name'],
                'guard_name' => $value['guard_name'],
                'is_main' => $value['is_main'],
                'admin_panel_access' => $value['admin_panel_access'],
                'description' => $value['description'],
            ]);
        }
    }
    public function add_permissions(){
        $defaultSystemVars = getVar('system');
        foreach ($defaultSystemVars['default_permission'] as $value) {
            Permission::create([
                'name' => $value['name'],
                'guard_name' => $value['guard_name'],
                'is_main' => $value['is_main'],
            ]);
        }
    }
    public function assign_roles_to_permissions(){
        $defaultSystemVars = getVar('system');
        foreach ($defaultSystemVars['role_permission'] as $value) {
            $role = Role::findByName($value['name']);
            $permissionArray = [];
            $permissionArray = explode(',', $value['permissions']);
            foreach ($permissionArray as $permission) {
                $role->givePermissionTo($permission);
            }
        }
    }
    */

    public function add_user(Request $request){

        $request->validate([
            "name" => ['required', 'string', 'max:25'],
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "password" => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $data = [];
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['password'] = bcrypt($request['password']);

        if($user = User::create($data)){

            $user->assignRole(Role::findByName('Admin'));

            Session::flash("site_message", __('messages.Successfully_Added', ['operation' => trans_choice('site.Blog', 1)]));
            Session::flash("site_message_type", "success");
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }



            return redirect()->route('install.index');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => __('site.Creating')]));
        Session::flash("site_message_type", "error");

        return redirect()->route('install.index')->withInput();
    }

    public function fail($validator, $data){
        Session::flash("site_message", __('general.Required_Field'));
        Session::flash("site_message_type", "error");

        return redirect()->back()
            ->withErrors($validator)
            ->withInput($data);
    }


}

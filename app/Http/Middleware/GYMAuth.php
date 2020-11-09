<?php

namespace App\Http\Middleware;

use App\Helpers\Helper;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GYMAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!checkDBConnections() && !$request->is('install')){
            clearAllLogs();
            return redirect()->route('install.index');
        }

        if(checkDBConnections()){
           DB::connection()->disableQueryLog();
            Helper::getRoles();
            Helper::getPermissions();
            Helper::assignRolePermissions();

            if(count(User::all()) == 0 && (!$request->is('install'))){
                return redirect()->route('install.index');
            }
        }
        return $next($request);
    }
}

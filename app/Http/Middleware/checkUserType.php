<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckUsertype
{
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds = ['admin' => 'admin', 'lect' => 'lecturer', 'invig' => 'invig', 'stud' => 'student'];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if(Auth::check()) {
          if(in_array(Auth::user()->usertype, $allowedRoleIds)) {
            return $next($request);
          }
        }

        return redirect('/');

    }
}

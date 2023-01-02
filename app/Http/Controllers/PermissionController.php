<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\Permission ;
class PermissionController extends Controller
{
 public function __construct(){

    $this->middleware('role_or_permission:test',['only'=>['coba']]);
    
 }

    public function removeRo(Permission $Permission,Role $role)
    {
        if ($Permission->hasRole($role)) {
            $Permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function coba()
    {
        dd('bisa');
    }
}

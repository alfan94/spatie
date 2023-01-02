<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\Permission as izin;
class AdminController extends Controller
{
    public function indexRole()
    {
        return view('admin.role');
    }
    public function indexPermission()
    {
        return view('admin.permission');
    }
  public function indexUser()
  {


    // $role=Auth::user()->getRoleNames();
    // dd($role);
    // auth()->user()->assignrole('admin');
    return view('admin.user');
  }
  public function editRole(Role $rol ,$id)
  {
    $rolee=Role::find($id);
    $permisi=izin::all();
    return view('admin.editrole',compact('rol','permisi','rolee'));
  }

  public function updateRolepermission(Request $request, Role $role)
  {
    if($role->hasPermissionTo($request->permission)){
     dd('sudah ada');
    }else{
        $role->givePermissionTo($request->permission);
    }
  }
 public function revokePermission(Role $role, Izin $izin)
 {
 
  if($role->hasPermissionTo($izin)){
    $role->revokePermissionTo($izin);
     return redirect()->back();
  }
}

public function editPermission(Izin $izin,$id,Role $rolee)
{
  $dat=Izin::find($id);

  $role=Role::all();
  return view('admin.editpermisi',compact('dat','role','rolee'));

}
 public function removeRo(Izin $izin,Role $role)
    {
        if ($izin->hasRole($role)) {
            $izin->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
            
   }

<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Profile, Permission};

class PermissionProfileController extends Controller
{

    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->with('permissions')->find($idProfile);
       
        if(!$profile){
            return redirect()->back();
        }
        
        $permissions = $profile->permissions;

        return view('admin.pages.profiles.permissions.permissions', compact('permissions', 'profile'));
    }

    public function profiles($idPermission)
    {
        
       
        if(!$permission = $this->permission->find($idPermission)){
            return redirect()->back();
        }
        
        $profiles = $permission->profiles()->get();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }

    public function permissionsAvailable($idProfile)
    {
       
        if(!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }
        
        $permissions = $this->permission->all();

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
       
        if(!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }
        
        $profile->permissions()->attach($request->permissions);
       
        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function detachPermissionProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions', $profile->id);

    }
}

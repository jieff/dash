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

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }
}

<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plans, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function profiles($idPlan)
    {
       
        if(!$plan = $this->plan->with('plans')->find($idPlan)){
            return redirect()->back();
        }
        
        $profiles = $plan->profile()->get();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function permissionsAvailable($idProfile)
    {
       
        if(!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }
        
        $permissions = $profile->permissionsAvailable();

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
}

<?php
use App\Models\Country;
use App\Models\Property;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;

if (!function_exists('roleById')) {
    function roleById($role_id)
    {
        $role = Role::select('name')->where('id', $role_id)->first();
        return !empty($role->name) ? $role->name : "";
    }
}

if (!function_exists('getCountryList')) {
    function getCountryList()
    {
        return Country::pluck('name', 'id')->toArray();
    }
}

if (!function_exists('getStatesByCountryId')) {
    function getStatesByCountryId($countryId)
    {
        return State::where('country_id', $countryId)->pluck('name', 'id')->toArray();
    }
}

if (!function_exists('getCountryById')) {
    function getCountryById($countryId)
    {
        $country = Country::select('name')->where('id', $countryId)->first();
        return $country->name;
    }
}

if (!function_exists('getStateById')) {
    function getStateById($stateId)
    {
        $state = State::select('name')->where('id', $stateId)->first();
        return $state->name;
    }
}

if (!function_exists('getUserData')) {
    function getUserData($userId = null)
    {
        $users = User::where(['is_deleted' => 0])->whereIn('role_id', [2, 3])->count();
        $landlords = User::where(['role_id' => 2, 'is_deleted' => 0])->count();
        $tenants = User::where(['role_id' => 3, 'is_deleted' => 0])->count();
        $allusers = (Object) [];
        $allusers->total = $users;
        $allusers->landlords = $landlords;
        $allusers->tenants = $tenants;
        return $allusers;
    }
}

if (!function_exists('getLandLordData')) {
    function getLandLordData($userId = null)
    {
        $userId = Auth::user()->id;
        $totalproperties = Property::where('landlord_id', $userId)->where(['status' => 1, 'is_deleted' => 0])->count();
        $verifiedProperties = Property::where('landlord_id', $userId)->where(['status' => 1, 'is_verified' => 1, 'is_deleted' => 0])->count();

        $properties = (Object) [];
        $properties->total = $totalproperties;
        $properties->verified = $verifiedProperties;
        return $properties;
    }
}

if (!function_exists('getLandlordScreening')) {
    function getLandlordScreening($userId = null)
    {
        $landlords = User::where(['role_id' => 2, 'status' => 1]) //Landlord
            ->get();
        return $landlords->isNotEmpty() ? $landlords : [];
    }
}

if (!function_exists('getTenantScreening')) {
    function getTenantScreening($userId = null)
    {
        $tenants = User::leftJoin('user_documents', 'user_documents.user_id', '=', 'users.id')
            ->where(['users.role_id' => 3, 'users.status' => 0]) //Tenants
            ->get();

        return $tenants->isNotEmpty() ? $tenants : [];
    }

}

if (!function_exists('human_readable_date')) {
    /**
     * Convert a date to a human-readable format.
     *
     * @param string $date
     * @return string
     */
    function human_readable_date($date)
    {
        return Carbon::parse($date)->translatedFormat('d F, Y');
    }
}

if (!function_exists('getuserbyId')) {
    function getuserbyId($userId)
    {
        $user = User::select('firstname', 'lastname')->where(['id' => $userId, 'status' => 1, 'is_deleted' => 0])->first();
        return !empty($user) ? $user->firstname . " " . $user->lastname : "N/A";
    }
}

if (!function_exists('document_verified')) {
    function document_verified()
    {
        $user = Auth::user();
        $role = $user->role_id;

        if ($role == 2) { //if user is landlord
            $documents = $user->documents->first();
            return isset($documents->is_verified) ? $documents->is_verified : "";

        } else {
            return "Sorry Landlord doesnt exists";
        }

    }
}

<?php
use App\Models\Country;
use App\Models\Role;
use App\Models\State;

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

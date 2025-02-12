<?php

use App\Models\Role;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;



function _isDateValid(string $date, $format = 'Y-m-d'): bool
{
    $date_object = DateTime::createFromFormat($format, $date);

    return $date_object && $date_object->format($format) === $date;
}
function _user()
{
 
    // Check if user data exists in session
    $user = Session::get('user_info');
       // Check if user data exists in session
    if ($user) {
        
        $user = (object) $user['data'];
        return $user;  
     
}else {
        // If no user data is found in session, return an error or handle accordingly
        return response()->json(['error' => 'User not found in session'], 404);
    }
}
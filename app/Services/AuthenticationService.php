<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
  public function verifyUser($request)
  {
    $user = User::where('username', $request->username)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return false;
    }

    session(['logged_in' => true]);
    return true;
  }
}
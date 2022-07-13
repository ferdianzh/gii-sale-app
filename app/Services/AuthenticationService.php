<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
  public function verifyUser($request)
  {
    $user = User::where('username', $request->username)->firstOrFail();

    if (!Hash::check($request->password, $user->password)) {
      return false;
    }

    session(['user' => $user->username]);
    return true;
  }
}
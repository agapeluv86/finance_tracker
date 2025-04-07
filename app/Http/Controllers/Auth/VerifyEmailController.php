<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class VerifyEmailController extends Controller
{
    
    public function __invoke(EmailVerificationRequest $request)
{
    $user = User::where('user_id', $request->route('user_id'))->firstOrFail();

    if ($user->hasVerifiedEmail()) {
        return redirect()->route('dashboard')->with('message', 'Email already verified.');
    }

    $user->markEmailAsVerified();
    event(new Verified($user));

    return redirect()->route('dashboard')->with('message', 'Email successfully verified.');
}
}

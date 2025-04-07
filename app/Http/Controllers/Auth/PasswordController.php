<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use App\Mail\PasswordChangedMail;

class PasswordController extends Controller
{
    /**
     * Update the user's password and send email notification.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = $request->user(); 

        
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

    
        Mail::to($user->email)->send(new PasswordChangedMail($user));

        return back()->with('status', 'password-updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetEmail(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'We can\'t find a user with that email address.');
        }

        $token = $this->generateToken();

        $this->sendEmail($user, $token);

        return redirect()->back()->with('success', 'We\'ve sent you an email with instructions on how to reset your password.');
    }

    private function generateToken()
    {
        return Str::random(60);
    }

    private function sendEmail($user, $token)
    {
        Mail::send('auth.emails.forgot-password', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Your Password');
        });
    }

    public function showResetForm(Request $request)
    {
        if ($request->has('token')) {

            $token = $request->input('token');

        } else {

            abort(404);

        }

        return view('auth.passwords.reset', ['token' => $token]);

    }

}


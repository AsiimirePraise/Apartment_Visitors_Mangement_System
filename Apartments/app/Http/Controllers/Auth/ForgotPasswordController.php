<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Validate the email for the given request.
     */
    protected function validateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string',
        ]);
    }

    /**
     * Send a reset link to the given user.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // Check if a user exists with both the email and mobile number
        $user = User::where('email', $request->email)
                    ->where('mobile', $request->mobile)
                    ->first();

        if (!$user) {
            return back()->withErrors(['email' => __('We can\'t find a user with that email address and mobile number.')]);
        }

        // Send the password reset link (using just the email as per default Laravel behavior)
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
}

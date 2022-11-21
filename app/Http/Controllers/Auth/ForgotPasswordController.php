<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withInput()->withErrors(['email' => trans($response)]);
    }
    function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('forgot-password-email-success', trans($response));
    }
}

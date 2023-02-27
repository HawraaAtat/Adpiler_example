<?php

namespace App\Http\Controllers;

use App\Models\TeamInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index($token = null)
    {
        if ($token) {
            return view('auth.login',compact("token"));
        }else{
            $token = null;
            return view('auth.login',compact("token"));
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


            if (Auth::attempt($credentials)) {
                // Authentication passed

                if($request->tokenn != null) {
                    $invitation = TeamInvitation::where('token', $request->tokenn)->first();

                    if (!$invitation) {
                        return redirect()->route('home')->with('error', 'Invalid invitation token.');
                    }

                    return view('emails.team_invitation', [
                        'invitation' => $invitation
                    ]);
                }
                return redirect()->intended('dashboard');
            } else {
                // Authentication failed
                return redirect()->back()->withInput()->withErrors(['authfaild' => 'The provided credentials are incorrect.']);
            }
        }

}

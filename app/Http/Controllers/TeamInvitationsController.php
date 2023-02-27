<?php

namespace App\Http\Controllers;

use App\Models\TeamInvitation;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamInvitationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $invitation = TeamInvitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('home')->with('error', 'Invalid invitation token.');
        }

        return view('emails.team_invitation', [
            'invitation' => $invitation
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function acceptInvitation($token)
    {
        $invitation = TeamInvitation::where('token', $token)->firstOrFail();

        // Update the user's role in the team
        $member = new TeamMember();
        $member->team_id = $invitation->team_id;
        $member->user_id = auth()->id();
        $member->role = $invitation->role;
        $member->save();

        // Delete the invitation so it can't be used again
        $invitation->delete();

        // Redirect the user to the team dashboard or wherever you want
        return redirect()->route('team-members.index');
    }
}

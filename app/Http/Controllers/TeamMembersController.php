<?php

namespace App\Http\Controllers;

use App\Mail\TeamInvitationMail;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $teamIds = $user->teams->pluck('pivot.team_id');
        $teams = Team::whereIn('id', $teamIds)->with('users')->get();

        return view('team_members.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $teams =Team::all();
        $userTeams = auth()->user()->teams;
        return view('team_members.create', compact('userTeams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:user,admin,manager',
            'team_id' => 'required',
        ]);

        // Generate a unique token for the invitation
        $token = Str::random(32);


        // Save the invitation details to the database
        $invitation = new TeamInvitation();
        $invitation->name = $request->input('name');
        $invitation->email = $request->input('email');
        $invitation->role = $request->input('role');
        $invitation->team_id = $request->input('team_id');
        $invitation->token = $token;
        $invitation->save();

        // Send the invitation email
        $url = route('team.invitation', $token);
        Mail::raw("You've been invited to join the team! Click this link to accept: {$url}", function($message) use ($request) {
            $message->to($request->input('email'))
                ->subject('Invitation to join the team');
        });



        return redirect()->back()->with('success', 'Invitation sent!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


}

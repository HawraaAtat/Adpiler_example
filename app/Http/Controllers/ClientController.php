<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\File;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'users' => 'required|array',
            'users.*' => 'exists:users,id'
        ]);


        $loggedInUser = Auth::user();

        $user_id= $loggedInUser->getAuthIdentifier();
        $user= User::find($user_id);
        $company_id= $user->company->id;

        $client = new Client;
        $client->client_name = $validatedData['client_name'];
        $client->user_id = $user_id;
        $client->company_id = $company_id;
        $client->save();

        $client->users()->attach($validatedData['users']);

        // Redirect to the desired page
        return redirect()->intended('dashboard')->with('success', 'Client added successfully!');


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

    public function showFiles($token)
    {
        $client = Client::where('token', $token)->firstOrFail();
//        $files = $client->files;
        $client_id = $client->id;
        $files = File::where('client_id', $client_id)->get();

        return view('clients.files', compact('client', 'files'));
    }
}

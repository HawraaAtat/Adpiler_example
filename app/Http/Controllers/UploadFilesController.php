<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadFilesController extends Controller
{
    /**
     * Display the upload files page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $loggedInUser = Auth::user();

        $user_id= $loggedInUser->getAuthIdentifier();
        $user= User::find($user_id);
        $files= $user->files;
//        $files = File::all();
        return view('upload_files.index', compact('files'));
    }

    public function create()
    {
        $clients = Client::all();
        $campaigns = Campaign::all();
        return view('upload_files.create', compact('clients', 'campaigns'));
    }

    /**
     * Store the uploaded files.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {

            $loggedInUser = Auth::user();
            $user_id= $loggedInUser->getAuthIdentifier();

            // Validate the form data
            $request->validate([
                'client_id' => 'nullable|exists:clients,id',
                'client_name' => 'required_without:client_id',
                'campaign_id' => 'nullable|exists:campaigns,id',
                'campaign_name' => 'required_without:campaign_id',
                'file' => 'required|file'
            ]);

            // If client_id is not provided, create a new client
            if (!$request->client_id) {
                $client = Client::create([
                    'client_name' => $request->client_name,
                    'user_id' => $loggedInUser->id,
                    'company_id' => $loggedInUser->company->id,
                ]);
            } else {
                $client = Client::find($request->client_id);
            }

            // If campaign_id is not provided, create a new campaign
            if (!$request->campaign_id) {
                $campaign = Campaign::create([
                    'client_id' => $client->id,
                    'campaign_name' => $request->campaign_name
                ]);
            } else {
                $campaign = Campaign::find($request->campaign_id);
            }

            // Upload the file to storage
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();

            $file = $request->file('file')->move('img/uploads',$file_name);


            // Save the file information to the database
            File::create([
                'user_id'=>$user_id,
                'client_id' => $client->id,
                'campaign_id' => $campaign->id,
                'file_name' => $file_name,
                'file_type' => $file_type,
            ]);

            // Return a success message
            return redirect()->route('upload-files.index')->with('success', 'File uploaded successfully!');
        }
    }

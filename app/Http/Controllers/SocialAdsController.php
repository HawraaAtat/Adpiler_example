<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Platform;
use App\Models\SocialAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialAdsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $ads = SocialAds::where('user_id', $user->id)->get();
        return view('ads.index', compact('ads'));
    }



    public function create()
    {
        $platforms = Platform::all();
        $campaigns = Campaign::all();
        return view('ads.create', compact('platforms','campaigns'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'platform_id' => 'required',
            'campaign_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $platform = Platform::findOrFail($validatedData['platform_id']);
        $image = $request->file('image');
        // $imagePath = $image->store('public/ads');

        $fileName = $request->file("image")->GetClientOriginalName();
        $file = $request->file('image')->move('img/ads',$fileName);


        $ad = SocialAds::create([
            'user_id' => Auth::user()->id,
            'campaign_id' => $validatedData['campaign_id'],
            'platform_id' => $validatedData['platform_id'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image_path' => $fileName,
        ]);

        return redirect()->route('social-ads.index')->withSuccess('Ad created successfully!');
    }

}

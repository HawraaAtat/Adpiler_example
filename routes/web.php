<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAdsController;
use App\Http\Controllers\TeamMembersController;
use App\Http\Controllers\UploadFilesController;
use App\Http\Controllers\TeamInvitationsController;
use App\Models\Client;
use App\Models\TeamInvitation;
use App\Models\Comment;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/{token?}', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');


Route::resource('register', RegisterController::class);
Route::post('store-company', [RegisterController::class, 'storeCompany'])->name('store.company');

Route::resource('client', ClientController::class);


Route::resource('comment_search', CommentController::class);
Route::get('/comments/search', [CommentController::class, 'search'])->name('comments.search');




Route::get('/create_company', function () {
    return view('auth.create_company');
});

Route::get('/create_client', function () {
    $user = Auth::user();
    // $users = $user->company->users;
    $teamIds = $user->teams->pluck('pivot.team_id');
    $teams = Team::whereIn('id', $teamIds)->with('users')->get();

    $users = collect();

    foreach ($teams as $team) {
        $users = $users->merge($team->users);
    }

    $uniqueUsers = $users->unique('id');

    return view('clients.create_client', compact('uniqueUsers'));
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $clients = Client::all();
        return view('home.dashboard', compact('clients', 'user'));
    });
    Route::get('/comments', function () {

        // $user = Auth::user();
        // $comments = $user->comments()->get();

        $loggedInUser = Auth::user();
        if($loggedInUser->teams()->first())
        {
            $team_id = $loggedInUser->teams()->first()->id;
            $team_members = DB::table('team_user')->where('team_id', $team_id)->pluck('user_id');
            $comments = Comment::whereIn('user_id', $team_members)->get();
        }
        else{
            $comments = [];
        }
        return view('home.comments', compact('comments'));
    });

    Route::resource('upload-files', UploadFilesController::class);

    Route::resource('social-ads', SocialAdsController::class);

    Route::resource('social-ads', SocialAdsController::class);

    Route::resource('team-members', TeamMembersController::class);


    Route::get('/team/invitation/{token}', function ($token) {
        $invitation = TeamInvitation::where('token', $token)->first();
        return view('emails.team_invitation', compact('invitation'));
    })->name('team.invitation');


    Route::post('/team/accept-invitation/{token}', [TeamInvitationsController::class, 'acceptInvitation'])->name('team.invitation.accept');




});



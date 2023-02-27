<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInvitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'token',
//        'team_id',
        'role',
    ];

    // Define the relationship with the team that sent the invitation
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Define the relationship with the user who accepts the invitation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

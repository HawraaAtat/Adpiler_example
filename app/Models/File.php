<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'client_id',
        'file_name',
        'file_type',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

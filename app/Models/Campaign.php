<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'campaign_name',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
    
    public function socialAds()
    {
        return $this->hasMany(SocialAds::class);
    }
}

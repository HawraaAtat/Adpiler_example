<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAds extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'campaign_id',
        'platform_id',
        'title',
        'description',
        'image_path',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}

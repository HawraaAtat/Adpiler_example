<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id',
        'member_id',
        'comment_text'
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function resolved()
    {
        return $this->hasOne(Resolved::class);
    }


}

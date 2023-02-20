<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolved extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'resolved_by',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function resolvedBy()
    {
        return $this->belongsTo(Member::class, 'resolved_by');
    }

}

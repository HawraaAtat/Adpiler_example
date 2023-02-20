<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'client_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'client_user');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function files()
    {
        return $this->hasMany(File::class, 'client_id', 'client_id');
    }

    public function members() {
        return $this->hasMany(Member::class, 'client_id', 'client_id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
    // $company = Company::first();
    // $users = $company->users;
    
}

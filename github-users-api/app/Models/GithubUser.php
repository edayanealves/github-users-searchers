<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubUser extends Model
{
    use HasFactory;


    protected $fillable = [
        'login',
        'avatar_url',
        'html_url',
        'type',
        'site_admin',
        'name',
        'company',
        'location',
        'email',
        'bio',
        'public_repos',
        'followers',
        'following',
        'location_lat',
        'location_long',
        'user_id',
        'created_at',
    ];

}

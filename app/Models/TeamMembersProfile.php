<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembersProfile extends Model
{
    protected $table = 'team';
    public $timestamps = false;
    use HasFactory;
}

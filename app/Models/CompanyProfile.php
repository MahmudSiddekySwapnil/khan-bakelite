<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'about_company';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'company_history',
        'mission',
        'vision',
        // Add other fields as needed
    ];
    use HasFactory;
}

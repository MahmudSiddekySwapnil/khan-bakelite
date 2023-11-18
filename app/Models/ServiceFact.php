<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFact extends Model
{
    protected $table = 'service_fact';
    public $timestamps = false;
    use HasFactory;
}

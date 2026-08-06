<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailDomain extends Model
{
    use HasFactory;

    protected $table = 'email_domains';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOption extends Model
{
    use HasFactory;

    protected $table = 'invoice_options';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    public $timestamps = false;
    protected $table = 'faktury';
    protected $fillable = [
        'datum',
        'cislo',
        'predmet',
        'suma',
        'dodavatel',
        'ico',
        'adresa'
    ];
}

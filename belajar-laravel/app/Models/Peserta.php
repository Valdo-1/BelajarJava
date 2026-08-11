<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PersertaFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age', 'email', 'address'];
}

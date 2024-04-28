<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPrecio extends Model
{
    use HasFactory;
    protected $table ="menuprecios";
    protected $primaryKey ="id";
    public $timestamps = false;
}

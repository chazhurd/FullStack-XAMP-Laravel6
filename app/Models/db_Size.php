<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class db_Size extends Model
{
    use HasFactory;
    public $connection="ipr";
    public $table = "db_sizes";
}

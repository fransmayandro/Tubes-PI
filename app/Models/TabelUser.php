<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class TabelUser extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'tbl_users';
}

<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "admin_menu";
    protected $primaryKey = "Id";
    public $timestamps = false;
}

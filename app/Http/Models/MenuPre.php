<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MenuPre extends Model
{
    protected $table = "admin_menu_premission";
    protected $primaryKey = "Id";
    public $timestamps = false;

    public function menuinfo(){
        return $this->hasOne('App\Http\Models\Menu','Id','mid');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MenuPre;

class DashController extends Controller
{
    /**
     * Admin dash Page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Main_view(Request $request){
        return view('admin.main');
    }
    /**
     * User manage Page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function User_view(Request $request){
        return view('admin.user');
    }
    public function test(){
        $result = MenuPre::where('userType','1')->get();
        foreach ($result as $item) {
            return $item->menuinfo;
        }
    }
}

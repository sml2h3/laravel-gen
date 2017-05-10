<?php

namespace App\Http\ViewComposers;

use App\Http\Models\MenuPre;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Manager;
class AdminBaseComposer
{
    protected $menuList = array();
    protected $username = '';
    /**
     * 创建一个新的属性composer.
     *
     * @param
     * @return void
     */
    public function __construct()
    {
        $userinfo = session('admintoken');
        $userinfo = json_decode(Crypt::decrypt($userinfo));
        $result = Manager::where('username',$userinfo->username)->first();
        $this->username = $userinfo->username;
        $userType = $result->userType;
        $result = MenuPre::where('userType',$userType)->get();
        foreach ($result as $m){
            $info = $m->menuinfo;
            if($info->isparent === 1){
                $this->menuList['list_'.$info->Id]['main'] = $info;
            }else{
                if(array_key_exists('list_'.$info->parent,$this->menuList)){
                    $this->menuList['list_'.$info->parent]['son'][] = $info;
                }
            }
        }

    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menu', $this->menuList);
        $view->with('username', $this->username);
    }
}
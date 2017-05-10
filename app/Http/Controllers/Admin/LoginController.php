<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    /**
     * @var code 状态码参数值以及含义
     * 100000 成功
     * 100001 账号或者密码为空
     * 100002 密码错误
     */
    protected $code;//状态码
    protected $result;


    protected function dealback(){
        $array = array(
            'code' => $this->code,
            'result' => $this->result
        );
        return json_encode($array);
    }

    public function Login_view(){
        return view('admin/login');
    }

    public function Login_action(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $is_rem = $request->get('is_rem');
        if($username == null || $password == null){
            $this->code = '100001';
            $this->result = '账号或者密码为空';
            return $this->dealback();
        }
        $userinfo = Manager::where('username',$username)->first();
        if($userinfo){
            $pass_tem = Crypt::decrypt($userinfo->password);
            if($pass_tem === $password){
                $info = array(
                    'username' => $username,
                    'password' => $password
                );
                $this->code = '100000';
                $this->result = 'main';
                session(['admintoken'=>Crypt::encrypt(json_encode($info))]);
                return $this->dealback();
            }else{
                $this->code = '100002';
                $this->result = '密码错误';
                return $this->dealback();
            }
        }else{
            $this->code = '100001';
            $this->result = '账号或者密码为空';
            return $this->dealback();
        }
    }

    protected function setSession(){

    }
}

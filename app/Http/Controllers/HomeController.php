<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use App\User;
class HomeController extends Controller
{
    protected $data = array();
    public function loginApi() {
        if (Request::isMethod('post')) {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            $cek = User::where('username',$this->data['username'] )->count();
            if ($cek > 0)
            {
                if (Auth::attempt($credentials,true)){
                    $res = array(
                            'users_id'  => (string)Auth::user()->id,
                            'status'    => 'success',
                            'token'     => Auth::user()->remember_token,
                            );
                    return json_encode($res);
                }
                $res = array(
                        'users_id'  => 'null',
                        'status'    => 'failed',
                        'token'     => 'null',
                        );
                return json_encode($res); 
            }
            else
            {
                $res = array(
                        'users_id'  => 'null',
                        'status'    => 'not-exist',
                        'token'     => 'null',
                        );
                return json_encode($res); 
            }
        }
    }
}

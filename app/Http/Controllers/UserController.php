<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends BaserController
{
    //

    public function getUserInfo()
    {


        $info = User::query()->find(auth()->id());
        $info['article'] =  \App\Article::query()->where('user_id',auth()->id())->count();
        return view('web.home.user_info',compact('info'));
    }


    public function getPrice()
    {
        //开启 0 未开启
        $status = auth()->user()->open_status;
        //0.1/s
        $exc = auth()->user()->exc;

        $userInfo =auth()->user()->toArray();
        $userInfo['open_time'] = auth()->user()->open_time;
        if ($status == 1){
            $price = $userInfo['price'] - (time() - $userInfo['open_time']) * $exc;
        }else{
            $price =  auth()->user()->price;
        }
        return response()->json([
            'code' => 'success',
            'price' => round($price,2),
            'open_time' => $status == 1 ? date('Y/m/d H:m:s',auth()->user()->open_time) : '没有开启推送！',
        ],200);
    }
}

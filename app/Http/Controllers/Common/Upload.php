<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Upload extends Controller
{
    //
    /**
     * pic图片上传
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload_image(Request $request)
    {
        $file = $request->file('pic');

        $imageType = ['image/jpeg','image/png','image/gif'];
        if (!in_array($file->getMimeType(),$imageType)){
            return response()->json(['msg'=>"不支持此类型图片格式！",'code'=>1]);
        }
        if ($file->isValid()){
            //获取文件扩展名称
            $ext =$file->getClientOriginalExtension();
            //获取临时文件路径
            $realPath = $file->getRealPath();
            //上传文件名称
            $filename ='pic/'.date('Ymd').uniqid().'.'.$ext;

            $bool = Storage::disk('article')->put($filename,file_get_contents($realPath));
            if ($bool){
                return response()->json([
                    'path' => 'article/'.$filename,
                    'url' => asset('article/'.$filename),
                    'code' => 1,
                    'msg' => '上传成功！'
                ],201);
            }else{
                return response()->json(['msg'=>'上传失败！','code'=>0]);
            }
        }
    }
}

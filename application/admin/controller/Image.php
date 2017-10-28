<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\common\lib\Upload;
class Image extends Base
{
    // 图片异步上传的接口
    public function upload0(){
        $file = Request::instance()->file('file');
        $info = $file->move('upload');
        if($info && $info->getPathname()){
            $data = [
                'status' => 1,
                'message' => 'OK',
                'data' => '/'.$info->getPathname()
            ];
            echo json_encode($data);exit;
        }
        echo json_encode(['status'=>0,'message'=>'上传失败']);
    }

    /**
     * 七牛图片上传
     * @return [type] [description]
     */
    public function upload(){
        // 捕获异常
        try{
            // 返回qiniu上的文件名
            $image = Upload::image();
        }catch(\Exception $e){
            echo json_encode(['status'=>0,'message'=>$e->getMessage()]);
        }
        // 返回给uploadify插件状态
        if($image){
            $data = [
                'status' => 1,
                'message' => 'OK',
                'data' => config('qiniu.image_url').'/'.$image,
            ];
            echo json_encode($data);exit;     
        }else{
            echo json_encode(['status'=>0,'message'=>'上传失败']);
        }
    }
}
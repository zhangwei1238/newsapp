<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"D:\wamp\www\app\public/../application/admin\view\news\edit.html";i:1508907853;s:66:"D:\wamp\www\app\public/../application/admin\view\public\_meta.html";i:1508335144;s:68:"D:\wamp\www\app\public/../application/admin\view\public\_footer.html";i:1508393175;}*/ ?>
<!--header-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/hadmin/lib/html5shiv.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/static/h-ui.admin/css/style.css" />

<!--[if IE 6]>
<script type="text/javascript" src="__STATIC__/hadmin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/lib/webuploader/0.1.5/webuploader.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/uploadify/uploadify.css" />
<script>
	// 引入图片上传的一个文件
	swf = "__STATIC__/admin/uploadify/uploadify.swf";
	// 图片上传的接口
	image_upload_url = "<?php echo url('image/upload'); ?>";
</script>
</head>
<body>
<article class="page-container">
  <form class="form form-horizontal" id="form-singwaapp" url="<?php echo url('news/add'); ?>">
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text" value="<?php echo $new['title']; ?>" placeholder="" id="title" name="title">
        <input type="hidden" value="<?php echo $new['id']; ?>" name="id" >
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text" value="<?php echo $new['small_title']; ?>" placeholder="" id="samll_title" name="small_title">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="catid" class="select">
                <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> 
                  <option value="<?php echo $key; ?>" <?php if($key == $new['catid']): ?> selected="selected" <?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>  
                </select>
				</span> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <textarea name="description" value="<?php echo $new['description']; ?>" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
        <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
      </div>
    </div>


    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">允许评论：</label>
      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
        <div class="check-box">
          <input type="checkbox" id="is_allowcomment" name="is_allowcomment" value="1">
          <label for="checkbox-pinglun">&nbsp;</label>
        </div>
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">是否推荐到首页头图：</label>
      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
        <div class="check-box">
          <input type="checkbox" id="is_head_figure" name="is_head_figure" value="1">
          <label for="checkbox-pinglun">&nbsp;</label>
        </div>
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">是否推荐：</label>
      <div class="formControls col-xs-8 col-sm-9 skin-minimal checked">
        <div class="check-box">
          <input type="checkbox" id="is_position" name="is_position" value="1">
          <label for="checkbox-pinglun">&nbsp;</label>
        </div>
      </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input id="file_upload"  type="file" multiple="true" >
        <img id="upload_org_code_img" src="<?php echo $new['image']; ?>" width="150" height="150">
        <input id="file_upload_image" name="image" type="hidden" multiple="true" value="<?php echo $new['image']; ?>">
      </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <script id="editor" type="text/plain" name="content" style="width:100%;height:400px;"><?php echo $new['content']; ?></script>
      </div>
    </div>
    <div class="row cl">
      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
        <button  class="btn btn-secondary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
        <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
      </div>
    </div>
  </form>
</article>

<!--header-->
<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/hadmin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>

 


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="__STATIC__/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/image.js"></script>
<script type="text/javascript">
  $(function(){
    $('.skin-minimal input').iCheck({
      checkboxClass: 'icheckbox-blue',
      radioClass: 'iradio-blue',
      increaseArea: '20%',

    });
    if(<?php echo $new['is_position']; ?>){
      $('#is_position').iCheck('check');
    }
    if(<?php echo $new['is_head_figure']; ?>){
      $('#is_head_figure').iCheck('check');
    }
    if(<?php echo $new['is_allowcomment']; ?>){
      $('#is_allowcomment').iCheck('check');
    }
    //表单验证
    $("#form-singwaapp").validate({
      rules:{
        title:{
          required:true,
        },
        small_title:{
          required:true,
        },
        catid:{
          required:true,
        },
        sources_type:{
          required:true,
        },
        is_allowcomments:{
          required:true,
        },

      },
      onkeyup:false,
      focusCleanup:true,
      success:"valid",
      submitHandler:function(form){
        weierapp_save1(form);// 需要小伙伴自定义一个singwaapp_save方法 用来处理抛送请求的哦
      }
    });

    var ue = UE.getEditor('editor');

  });

</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\wamp\www\app\public/../application/admin\view\login\index.html";i:1508900921;s:66:"D:\wamp\www\app\public/../application/admin\view\public\_meta.html";i:1508335144;s:68:"D:\wamp\www\app\public/../application/admin\view\public\_footer.html";i:1508393175;}*/ ?>
<!--包含头部文件-->
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
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"><h1 style="text-align:center">APP登录系统</h1></div>
<div class="loginWraper">

  <div id="loginform" class="loginBox">

    <form class="form form-horizontal" action="<?php echo url('login/check'); ?>" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-3">
          <input id="" name="code" type="code" placeholder="验证码" class="input-text size-L">
        </div>
        <div class="formControls   col-xs-offset-6">
          <span><img src="/captcha" alt="点击更换验证码" onclick="reloadcode(this)"></span>
        </div>
      </div>
      
      <div class="row cl">

        <div class="formControls col-xs-8 col-xs-offset-3">

          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
           
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright tp5打造APP系统</div>
<script>
    function reloadcode(obj){
      obj.src = '/captcha?id='+Math.random;
    }
</script>
<!--包含尾部文件-->

<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/hadmin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>

 

</body>
</html>
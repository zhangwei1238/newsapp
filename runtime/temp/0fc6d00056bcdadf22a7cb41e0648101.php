<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\wamp\www\app\public/../application/admin\view\news\index.html";i:1508945423;s:66:"D:\wamp\www\app\public/../application/admin\view\public\_meta.html";i:1508335144;s:68:"D:\wamp\www\app\public/../application/admin\view\public\_footer.html";i:1508393175;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <div class="text-c">
    <form action="<?php echo url('news/index'); ?>" method="post">
   <span class="select-box inline">
    <select name="catid" class="select">
          <option value="0">全部分类</option>
            <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <option value="<?php echo $key; ?>" <?php if($key == $catid): ?> selected="selected" <?php endif; ?>><?php echo $vo; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </select>
    </span> 日期范围：
      <input type="text" name="start_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="<?php echo $start_time; ?>" style="width:120px;" >
      -
      <input type="text" name="end_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="<?php echo $end_time; ?>"  style="width:120px;">

      <input type="text" name="title" id="" value="<?php echo $title; ?>" placeholder=" 资讯名称" style="width:250px" class="input-text">
      <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
    </form>
  </div>

  <div class="mt-20">
    <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive" >
      <thead>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">ID</th>
        <th>标题</th>
        <th width="80">分类</th>
        <th width="80">缩图</th>
        <th width="120">更新时间</th>
        <th width="40">是否推荐</th>
        <th width="60">发布状态</th>
        <th width="120">操作</th>
      </tr>
      </thead>
      <tbody>
      <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <tr class="text-c">
        <td><input type="checkbox" value="" name=""></td>
        <td><?php echo $vo['id']; ?></td>
        <td class="text-l"><u style="cursor:pointer" class="text-primary"  title="查看"><?php echo $vo['title']; ?></u></td>
        <td><?php echo getCatName($vo['catid']); ?></td>
        <td><img width="60" height="60" class="picture-thumb" src="<?php echo $vo['image']; ?>"></td>
        <td><?php echo $vo['update_time']; ?></td>
        <td><?php echo isYesNo($vo['is_position']); ?></td>
        <td class="td-status"><?php echo status($vo['id'],$vo['status']); ?></td>
        <td class="f-14 td-manage"> <a style="text-decoration:none" class="ml-5"   href="<?php echo url('News/edit',['id'=>$vo['id']]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5"   href="javascript:void(0);" onclick="app_delete(this)" del_url="<?php echo url('News/delete',['id'=>$vo['id']]); ?>" title="删除" h><i class="Hui-iconfont">&#xe6e2;</i></a></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
    <div id="laypage"> </div>
  </div>
  
</div>
<!--header-->
<script type="text/javascript" src="__STATIC__/hadmin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/hadmin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>

 


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/hadmin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
  //分页
  var url = '<?php echo url('news/index'); ?>'+'?<?php echo $query; ?>';
  laypage({
    cont: 'laypage', //分页容器的id
    pages: <?php echo $totalPage; ?>, //总页数
    skin: '#5FB878', //自定义选中色值
    curr: <?php echo $curr; ?>,
    skip: true, //开启跳页
    jump: function(obj, first){
      if(!first){
        // alert(url + '?page='+obj.curr);
        location.href= url + '&page='+obj.curr;
      }
    }
  });

</script>
<style>
  .imooc-app .pagination li{display:inline; padding-left:10px;}
  .pagination .active{color:red}
  .pagination .disabled{color:#888888}
</style>
</body>
</html>
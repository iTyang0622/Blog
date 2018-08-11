<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    
    <link rel="stylesheet" type="text/css" href="/d/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="/d/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/d/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/d/css/font.css">
	<link rel="stylesheet" href="/d/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/d/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/d/js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">X-admin v2.0</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
              <dd><a href="./login.html">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>分类管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                   
                    <li>
                        <a href="/admin/cate/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加分类</cite>
                        </a>
                    </li >
                    <li>
                        <a href="/admin/list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>回收站</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <!-- <ul class="sub-menu"> -->

        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <!-- 内容开始 -->
          <div class="layui-tab-content">
            
        @if(session('success'))     <!--  继承 全局 -->
        <!-- 读取跳转信息 -->
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">{{ session('success') }}  <!-- 携带添加传来的信息  显示添加成功--></button>
        </div>
        @endif

        @if(session('error'))
         <div class="layui-input-block">
            <button type="reset" class="layui-btn layui-btn-primary">{{ session('error') }}  <!-- 携带添加传来的信息  显示添加失败</button>
        </div> -->
        @endif
               <!-- 占位符 -->
                @section('container')



                @show
            
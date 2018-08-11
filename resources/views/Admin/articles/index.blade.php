@extends('Admin\header')

@section('form')


<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/admin/articles">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form action="/admin/articles" method="post">
          {{ csrf_field() }}
          <input type="text" name="uname"  placeholder="请输入关键字" autocomplete="off" style="width: 300px; height: 33px;" >
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="btn btn-danger" ><i class="layui-icon"></i>批量删除</button>
        <a href=""><button class="btn btn-info">添加数据</button></a>
        <span class="x-right" style="line-height:40px">共有数据：{{ $count }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <input type="checkbox" name="check">
            </th>
            <th>ID</th>
            <th>文章标题</th>
            <th>文章缩略图</th>
            <th>文章内容</th>
            <th>发布时间</th>
            <th>文章作者</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	@foreach($data as $k=>$v)
          <tr>
            <td class="link">
             <input type="checkbox"  value="{{ $v['art_id'] }}" name="che" >
            </td>
            <td>{{ $v['art_id'] }}</td>
            <td>{{ $v['art_title'] }}</td>
            <td>{{ $v['art_thumb'] }}</td>
            <td>{{ $v['art_content'] }}</td>
            <td>{{ $v['art_time'] }}</td>
            <td>{{ $v['art_writer'] }}</td>

            @if($v['status'] == 1)
            <td>显示中</td>
            @endif
            <td>
              <form action="/admin/articles/{{ $v['art_id'] }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" value="删除">
                
              </form>
              
            </td>
            
          </tr>
          @endforeach 
        </tbody>
      </table>
      <div style="margin: 0 auto; text-align: center;">
        {!! $data->appends(['uname'=>$uname])->render() !!}
      </div>
      
    </div>
    <script type="text/javascript">
    $('input[name=check]').eq(0).click(function(){
     
      
      // 获取所有被选中的多选框
      var list = $('td input:checkbox:checked');
      // 将所有的多选框选中
      $('td input:checkbox').attr('checked',true);
      // 让选中的取反
      list.attr('checked',false);


    });
    $('button').eq(1).click(function(){
      var ids = [];   
      // 获取选择元素的id
      $('td input:checked').each(function(){
        var n = $(this).val();
        ids.push(n);
        
      });
      if(ids.length <= 0){
        alert('请选择要删除数据');
        return;
      }   

      $.get('/admin/articles/create',{id:ids},function (msg) {
        


        if (msg == 'success') {
          $('td input:checked').parent().parent().remove();
          alert('删除成功');
        }else{
          alert('删除失败');
        }
      }); 

     });
     

    </script>

@endsection



@extends('Admin\yejiao')
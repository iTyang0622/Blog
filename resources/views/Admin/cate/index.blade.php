@extends('Admin/header')
@section('container')
<div class="layui-form-item">
  <div class="btn btn-success">
    <span><a href="/admin/cate/create">添加</a></span>
  </div>
  <div class="btn btn-warning">
    <span><a href="/admin/cate">分类列表</a></span>
  </div>
</div>


<div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/cate" method="get">
          {{ csrf_field() }}
        
          关键字:<input type="text" name="search"  value="" placeholder="请输入分类名称" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="search"><i class="layui-icon">&#xe615;</i></button>
        </form>
</div>

  <table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="150">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>类名</th>
      <th>添加时间</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
  	@foreach($data as $k=>$v)
    <tr align="center">
      <td>{{ $v->id }}</td>
      <td>{{ $v->cates_name }}</td>
      <td>{{ $v->created_at }}</td>
      <td>
      	<form action="/admin/cate/{{ $v->id }}/edit" method="get" style="display: inline;">
      		{{ csrf_field() }}
      		<input type="submit" value="修改" class="btn btn-warning">
      		
      	</form>

      	<form action="/admin/cate/{{ $v->id }}" method="post" style="display: inline;">
      		{{ csrf_field() }}
      		{{ method_field('DELETE') }}
      		<input type="submit" value="删除" class="btn btn-danger">
      		
      	</form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>    

<!-- 分页 {!! $data->render() !!}-->
{!! $data->appends($request)->render() !!}
 <!-- appends($request) 携带搜索所需的参数 -->
<!-- ['search'=>$search] 相当于 $request -->
@endsection
@extends('Admin/yejiao')

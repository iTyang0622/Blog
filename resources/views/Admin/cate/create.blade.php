@extends('Admin/header')
@section('container')

<div class="layui-form-item">
  <div class="btn btn-success">
    <span>添加分类</span>
  </div>
</div>

 <div class="x-body">
        <form class="layui-form" action="/admin/cate" method="post">
          {{ csrf_field() }}
          <div class="layui-form-item">

            <!-- 显示错误信息开始 -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- 结束 -->
            
              <label for="catesname" class="layui-form-label">
                  <span class="x-red">*</span>类名
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="cates_name"   value="{{ old('cates_name') }}" class="layui-input">

              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>添加类名

              </div>
          </div>
          
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  添加
              </button>

          </div>
      </form>
    </div>

@endsection

@extends('Admin/yejiao')
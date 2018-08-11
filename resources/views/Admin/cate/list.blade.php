@extends('Admin/header')
@section('container')

<div class="layui-form-item">
  <div class="btn btn-warning">
    <span>回收站</span>
  </div>
</div>

	<table class="layui-table">
	  	<thead>
	    	<tr>
		      @foreach($deldata as $k=>$v)
		    
				<td>
					<form action="/admin/rollback/{{ $v->id }}" method="get" style="width: 180px;">
			      		{{ csrf_field() }}

			      		{{ $v->id }} ~~~~~ {{ $v->cates_name }}
			      		
			      		<input type="submit" value="回收站" class="btn btn-success">
	  				</form>
				</td>
				@endforeach
	        </tr>
    	</thead>
    	<br><br><br><br><br><br>
    	<tbody>
			<tr>
				@foreach($data as $k=>$v)
		
				<td>
					<form action="/admin/cate/{{ $v->id }}" method="post" style="width: 180px;">
			      		{{ csrf_field() }}
			      		{{ method_field('DELETE') }}
			      		{{ $v->id }} ~~~~~ {{ $v->cates_name }}
			      		
			      		<input type="submit" value="软删除" class="btn btn-danger">
	  				</form>
				</td>
				@endforeach
			</tr>
		</tbody>
		<tfoot></tfoot>
	</table>

{!! $deldata->render() !!}
    	
@endsection
@extends('Admin/yejiao')
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $search = $request -> input('search','');
        // dd($search);
       //获取数据 并且分页
        $data = Cates::where('cates_name','like','%'.$search.'%')->paginate(3);
        // 加载模板
        return view('Admin/cate/index',['data'=>$data,'request'=>$request->all()]);
        // 'search'=>$search 也可以改成 'request'=>$request->all()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin/cate/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // 字段验证
        $this->validate($request, [

        'cates_name' => 'required|unique:cates',
        ],[ 
                // 显示错误信息
            'cates_name.required' => '用户名必填', 
            'cates_name.unique' => '用户名已存在',
        ]);
    
        DB::beginTransaction(); //开启事务
        // 插入数据
        $cate = new Cates;
        $cate -> cates_name = $request -> input('cates_name');
        $res = $cate -> save();
        if ($res) {
            DB::commit();//提交事务
            return redirect('/admin/cate')->with('success','添加成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','添加失败');
        }
        // 显示列表 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取id
        $id = $id;
        // dd($a);
        //加载模板
        return view('admin/cate/update',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 字段验证
        $this->validate($request, [

        'cates_name' => 'required|unique:cates',
        ],[ 
                // 显示错误信息
            'cates_name.required' => '用户名必填', 
            'cates_name.unique' => '用户名已存在',
        ]);

        DB::beginTransaction(); //开启事务
        // 插入数据库
        $cate = Cates::find($id);
        $cate -> cates_name = $request -> input('cates_name');
        $res = $cate -> save();
        if ($res) {
            DB::commit();//提交事务
            return redirect('/admin/cate')->with('success','修改成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function getList()
    {
        // $data = Cates::paginate(3);
        // 获取被软删除的数据
        $a = Cates::onlyTrashed()->paginate(4);

        return view('admin/cate/list',['data'=>Cates::all(),'deldata'=>$a]);
    }
    
    //恢复
    public function getRollback($id)
    {
        DB::beginTransaction();//开启事务
        $res = Cates::withTrashed()->where('id',$id)->restore();
        if ($res) {
            DB::commit(); //提交事务
            return redirect('/admin/cate')->with('success','恢复成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','恢复失败');
        }
        
    }

    public function destroy($id)
    {
       
       DB::beginTransaction();//开启事务
        // 软删除用户
        $res = Cates::destroy($id);
        if ($res) {
            DB::commit();//提交事务
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','删除失败');
        }
    }

}

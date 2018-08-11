<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\articles;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        $uname = $request->input('uname','');
       
        $data = articles::where('art_content','like','%'.$uname.'%')->paginate(5);
        $count = articles::count();
        return view('Admin.articles.index',['title'=>'内容详情','data'=>$data,'count'=>$count,'uname'=>$uname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $res = articles::destroy($id);
        if ($res > 0) {
             echo 'success';
        }else{
           echo 'error';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $art_content = $request->input('uname','');
        
        $data = articles::where('art_content','like','%'.$art_content.'%')->get();

        return view('Admin.articles.index',['title'=>'内容详情','data'=>$data,'count'=>$count]);
    }

    /**
     * 删除内容详情.
     *
     * @param  整形 删除的id
     * @return 受影响行数
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // 接受参数 删除内容 
        $res = articles::destroy($id);
      
        if ($res > 0) {
            return redirect('/admin/articles')->with('success','删除成功');
        }else{
            return redirect('/admin/articles')->with('error','删除失败');
        }
    }
}

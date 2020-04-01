<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Type;
use App\News;
class NewController extends Controller
{
    /**列表展示
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsInfo=News::leftjoin("type","news.type_id","=","type.type_id")->
        paginate(3);
        if(request()->ajax()){
            return view("new.ajaxpage",['newsInfo'=>$newsInfo]);
        }
        return view("new.index",['newsInfo'=>$newsInfo]);
    }
    //详情页展示
    public function polist($id){
        $count=Redis::setnx("add".$id,1)?Redis::get("add".$id):Redis::incr("add".$id);
            $newsData=News::leftjoin("type","news.type_id","=","type.type_id")->find($id);
            return view("new.polist",['newsData'=>$newsData,'count'=>$count]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res=Type::get();
        return view("new.create",['res'=>$res]);
    }

    /**添加的方法
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except("_token");
        //文件上传
        if($request->file("new_img")){
            $file=request()->file('new_img');
            if($file->isValid()){}
            $post['new_img']=$file->store("uploads");
        }
            //获取session中的用户
        $admin=$request->session()->get("admin");
        $post['new_man']=$admin->admin_name;
        $post['new_time']=time();
        $res= News::insert($post);
        if($res){
            return redirect("/new/index");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

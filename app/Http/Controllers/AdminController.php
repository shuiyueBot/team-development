<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Admin;
use App\Article;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name;
        $where=[];
        if($name){
            $where[]=["admin_name","like","%$name%"];
        }

        $adminInfo=Admin::where($where)->paginate(2);
        $query=request()->all();
        return view("admin.index",['adminInfo'=>$adminInfo,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证表单
        $request->validate([
        
            'admin_name' => 'required|unique:admin',
            'admin_pwd' => 'required',
            'admin_email' => 'required',
            'admin_tel' => 'required',
        ],[
            'admin_name.required'=>'用户名不能为空',
            'admin_name.unique'=>'用户名已存在',
            'admin_pwd.required'=>'密码不能为空',
            'admin_email.required'=>'邮箱不能为空',
            'admin_tel.required'=>'电话不能为空'
        ]);
        $post=request()->except("_token");
        $res=Admin::insert($post);
        if($res){
            return redirect("admin/index");
        }
    }
    public function indexShow(){
       $admin=session("admin");
       $admin_id=(int)$admin->admin_id;
        $adminInfo=Admin::select("admin_level")->find($admin_id);
        $level=$adminInfo->admin_level;
        // dd($level);
        return view("admin.indexShow",['level'=>$level]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    //即点及改
    public function SetName(){
        $ziduan=request()->ziduan;
        $admin_id=request()->admin_id;
        $val=request()->val;
        $res=Admin::where("admin_id",$admin_id)->update([$ziduan=>$val]);
        if($res!==false){
            echo 1;
        }
    }
}

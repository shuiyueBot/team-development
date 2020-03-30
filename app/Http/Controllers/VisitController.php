<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Salesman;
use App\Visit;


class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slae_name=request()->slae_name;
        $cust_name=request()->cust_name;
        $where=[];
        if($slae_name){
            $where[] = ['slae_name','like',"%$slae_name%"];
        }
        if($cust_name){
            $where[] = ['cust_name','like',"%$cust_name%"];
        }
        $pageSize=config('app.pageSize');
        $visit=Visit::orderby('visit_id','desc')
            ->select('visit.*','salesman.slae_name','customer.cust_name')
                ->leftjoin('salesman','visit.slae_id','=','salesman.slae_id')
            ->leftjoin('customer','visit.cust_id','=','customer.cust_id')
            ->where($where)
            ->paginate($pageSize);
        $salemodel=new Salesman();
        $sale=$salemodel::all();
        $custmodel=new Customer();
        $cust=$custmodel::all();
        $query=request()->all();

        return view('visit.index',['visit'=>$visit,'sale'=>$sale,'slae_name'=>$slae_name,'cust'=>$cust,'cust_name'=>$cust_name,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salemodel=new Salesman();
        $custmodel=new Customer();
        $sale=$salemodel::all();
        $cust=$custmodel::all();
        return view('visit.create',['sale'=>$sale,'cust'=>$cust]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post=$request->except('_token');

        $validatedData=$request->validate([
             'visit_man'=>'required',
            'visit_man'=>'unique:visit',
             'visit_address'=>'required',
            'visit_nexttime'=>'required',
         ],[
             'visit_man.required'=>'拜访人必填！',
            'visit_man.unique'=>'拜访人已存在！',
             'visit_address.required'=>'拜访地址必填',
            'visit_nexttime.required'=>'下次拜时间必填',
         ]);
        $post['visit_time']=time();
        $res=Visit::insert($post);
        if($res){
            return redirect('visit/index');
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
        $visit=Visit::where('visit_id',$id)->first();
        $salemodel=new Salesman();
        $custmodel=new Customer();
        $sale=$salemodel::all();
        $cust=$custmodel::all();
        return view('visit.edit',['visit'=>$visit,'sale'=>$sale,'cust'=>$cust]);
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
        $validatedData=$request->validate([
            'visit_man'=>'required',
            'visit_man'=>'unique:visit',
            'visit_address'=>'required',
            'visit_nexttime'=>'required',
        ],[
            'visit_man.required'=>'拜访人必填！',
            'visit_man.unique'=>'拜访人已存在！',
            'visit_address.required'=>'拜访地址必填',
            'visit_nexttime.required'=>'下次拜时间必填',
        ]);
        $post=$request->except(['_token']);
        $res=Visit::where('visit_id',$id)->update($post);
        if($res!==false){
            return redirect('/visit/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Visit::destroy($id);
        if($res){
            return redirect('/visit/index');
        }
    }
    public function checkonly(){
        $visit_man=request()->visit_man;
        $count=Visit::where('visit_man',$visit_man)->count();

        return json_encode(['code'=>'00000','count'=>$count]);
    }
}

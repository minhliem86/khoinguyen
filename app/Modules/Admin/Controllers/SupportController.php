<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SupportRepository;
use Datatables;
use DB;

class SupportController extends Controller
{
    protected $supportRepo;

    public function __construct(SupportRepository $support){
        $this->supportRepo = $support;
    }
    public function index()
    {
        return view('Admin::pages.support.index');
    }

    public function getData(Request $request)
    {
        $support = DB::table('supports')->select(['id','support_id','name','order', 'status']);
            return Datatables::of($support)
            ->addColumn('action', function($support){
                return '<a href="'.route('admin.support.edit', $support->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
                <form method="POST" action=" '.route('admin.support.destroy', $support->id).' " accept-charset="UTF-8" class="inline-block-span">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.support.destroy', $support->id).' " onclick="confirm_remove(this);" > Remove </button>
               </form>' ;
           })->addColumn('status', function($support){
               $status = $support->status ? 'checked' : '';
               $support_id =$support->id;
               return '
                 <label class="toggle">
                    <input type="checkbox" name="status" value="1" '.$status.'   data-id ="'.$support_id.'">
                    <span class="handle"></span>
                  </label>
              ';
           })->editColumn('order', function($support){
                   return "<input type='text' name='order' class='form-control' data-id= '".$support->id."' value= '".$support->order."' />";
           })->setRowId('id')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('Admin::pages.support.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $order = $this->supportRepo->getOrder();
         $data = [
             'support_id' => $request->input('support_id'),
             'name' => $request->input('name'),
             'order' => $order,
         ];
         $this->supportRepo->create($data);
         return redirect()->route('admin.support.index')->with('success','Created !');
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
         $inst = $this->supportRepo->find($id);
         return view('Admin::pages.support.edit', compact('inst'));
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
         $data = [
           'support_id' => $request->input('support_id'),
           'name' => $request->input('name'),
           'order' => $request->input('order'),
           'status' => $request->input('status'),
         ];
         $this->supportRepo->update($data, $id);
         return redirect()->route('admin.support.index')->with('success', 'Updated !');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $this->supportRepo->delete($id);
         return redirect()->route('admin.support.index')->with('success','Deleted !');
     }

     /*DELETE ALL*/
     public function deleteAll(Request $request)
     {
         if(!$request->ajax()){
             abort(404);
         }else{
              $data = $request->arr;
              $response = $this->supportRepo->deleteAll($data);
              return response()->json(['msg' => 'ok']);
        }
     }

     /*UPDATE ORDER*/
     public function postAjaxUpdateOrder(Request $request)
     {
         if(!$request->ajax())
         {
             abort('404', 'Not Access');
         }else{
             $data = $request->input('data');
             foreach($data as $k => $v){
                 $upt  =  [
                     'order' => $v,
                 ];
                 $obj = $this->supportRepo->find($k);
                 $obj->update($upt);
             }
             return response()->json(['msg' =>'ok', 'code'=>200], 200);
         }
     }

     /*CHANGE STATUS*/
     public function updateStatus(Request $request)
     {
         if(!$request->ajax()){
             abort('404', 'Not Access');
         }else{
             $value = $request->input('value');
             $id = $request->input('id');
             $cate = $this->supportRepo->find($id);
             $cate->status = $value;
             $cate->save();
             return response()->json([
                 'mes' => 'Updated',
                 'error'=> false,
             ], 200);
         }
     }
}

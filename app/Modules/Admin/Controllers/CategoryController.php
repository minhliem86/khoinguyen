<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Datatables;
use DB;

class CategoryController extends Controller
{
    protected $cateRepo;
    public function __construct(CategoryRepository $cate)
    {
        $this->cateRepo = $cate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $inst = $this->cateRepo->all();

        return view('Admin::pages.category.index');
    }

    public function getData(Request $request)
    {
        $cate = $this->cateRepo->all(['id', 'title', 'avatar_img', 'order', 'status']);
        return Datatables::of($cate)->make(true);
    //     ->addColumn('action', function($cate){
    //         return '<a href="'.route('admin.category.edit', $cate->id).'" class="btn btn-info btn-xs"> Edit </a>
    //         <form method="POST" action=" '.route('admin.category.destroy', $cate->id).' " accept-charset="UTF-8" class="inline">
    //             <input name="_method" type="hidden" value="DELETE">
    //             <input name="_token" type="hidden" value="'.csrf_token().'">
    //                        <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.category.destroy', $cate->id).' " onclick="confirm_remove(this);" > Remove </button>
    //        </form>' ;
    //    })->addColumn('order', function($cate){
    //        return "<input type='text' name='order' class='form-control' data-id= '".$cate->id."' value= '".$cate->order."' />";
    //    })->filter(function($query) use ($request){
    //        if ($request->has('name')) {
    //            $query->where('title', 'like', "%{$request->get('name')}%");
    //        }
    //    })->setRowId('id')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
             $data = $request->arr;
             $response = $this->cateRepo->deleteAll($data);
             return response()->json(['msg' => 'ok']);
       }
    }

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
                $obj = $this->cateRepo->find($k);
                $obj->update($upt);
            }
            return response()->json(['msg' =>'ok', 'code'=>200], 200);
        }
    }
}

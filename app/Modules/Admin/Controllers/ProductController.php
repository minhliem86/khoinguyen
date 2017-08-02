<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Datatables;
use DB;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $product)
    {
        $this->productRepo = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin::pages.product.index');
    }

    public function getData(Request $request)
    {
        $product = DB::table('products')->join('categories', 'products.category_id', '=','categories.id')->select(['products.id', 'products.title', 'products.avatar_img', 'products.price', 'products.order', 'products.status']);

        return Datatables::of($product)
        ->addColumn('action', function($product){
            return '<a href="'.route('admin.product.edit', $product->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
            <form method="POST" action=" '.route('admin.product.destroy', $product->id).' " accept-charset="UTF-8" class="inline-block-span">
                <input name="_method" type="hidden" value="DELETE">
                <input name="_token" type="hidden" value="'.csrf_token().'">
                           <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.product.destroy', $product->id).' " onclick="confirm_remove(this);" > Remove </button>
           </form>' ;
       })->editColumn('order', function($product){
               return "<input type='text' name='order' class='form-control' data-id= '".$product->id."' value= '".$product->order."' />";
       })->editColumn('status', function($product){
           $status = $product->status ? 'checked' : '';
           $product_id =$product->id;
           return '
             <label class="toggle">
                <input type="checkbox" name="status" value="1" '.$status.'   data-id ="'.$product_id.'">
                <span class="handle"></span>
              </label>
          ';
      })->editColumn('avatar_img',function($product){
          return '<img src="'.$product->avatar_img.'" width="120" class="img-responsive">';
        })->filter(function($query) use ($request){
           if (request()->has('name')) {
               $query->where('products.title', 'like', "%{$request->input('name')}%");
           }
       })->setRowId('id')->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.product.create');
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
        $inst = $this->productRepo->find($id);
        return view('Admin::pages.product.edit', compact('inst'));
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
        $this->productRepo->delete($id);
        return redirect()->route('admin.product.index')->with('success', 'Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
      if(!$request->ajax()){
          abort(404);
      }else{
           $data = $request->arr;
           $response = $this->productRepo->deleteAll($data);
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
                $obj = $this->productRepo->find($k);
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
            $cate = $this->productRepo->find($id);
            $cate->status = $value;
            $cate->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}

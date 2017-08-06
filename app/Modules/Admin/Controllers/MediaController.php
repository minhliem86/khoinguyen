<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class MediaController extends Controller
{
    protected $mediaRepo;
    protected $common;
    public function __construct(MediaRepository $media, CommonRepository $common)
    {
        $this->mediaRepo = $media;
        $this->common = $common;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin::pages.media.index');
    }

    public function getData(Request $request)
    {
        $media = DB::table('medias')->select(['id','caption', 'img_url','order', 'status']);
            return Datatables::of($media)
            ->addColumn('action', function($media){
                return '<a href="'.route('admin.media.edit', $media->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
                <form method="POST" action=" '.route('admin.media.destroy', $media->id).' " accept-charset="UTF-8" class="inline-block-span">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.media.destroy', $media->id).' " onclick="confirm_remove(this);" > Remove </button>
               </form>' ;
           })->addColumn('status', function($media){
               $status = $media->status ? 'checked' : '';
               $media_id =$media->id;
               return '
                 <label class="toggle">
                    <input type="checkbox" name="status" value="1" '.$status.'   data-id ="'.$media_id.'">
                    <span class="handle"></span>
                  </label>
              ';
           })->editColumn('order', function($media){
                   return "<input type='text' name='order' class='form-control' data-id= '".$media->id."' value= '".$media->order."' />";
           })->editColumn('img_url',function($media){
             return '<img src="'.asset('public/upload').'/'.$media->img_url.'" width="120" class="img-responsive">';
         })->setRowId('id')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('Admin::pages.media.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         if($request->has('img_url')){
             $img_url = $this->common->getPath($request->input('img_url'));
         }else{
           $img_url = "";
         }
         $order = $this->mediaRepo->getOrder();
         $data = [
             'caption' => $request->input('caption'),
             'img_url' => $img_url,
             'order' => $order,
         ];
         $this->mediaRepo->create($data);
         return redirect()->route('admin.media.index')->with('success','Created !');
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
         $inst = $this->mediaRepo->find($id);
         return view('Admin::pages.media.edit', compact('inst'));
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
         $img_url = $this->common->getPath($request->input('img_url'));
         $data = [
           'caption' => $request->input('caption'),
           'img_url' => $img_url,
           'order' => $request->input('order'),
           'status' => $request->input('status'),
         ];
         $this->mediaRepo->update($data, $id);
         return redirect()->route('admin.media.index')->with('success', 'Updated !');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $this->mediaRepo->delete($id);
         return redirect()->route('admin.media.index')->with('success','Deleted !');
     }

     /*DELETE ALL*/
     public function deleteAll(Request $request)
     {
         if(!$request->ajax()){
             abort(404);
         }else{
              $data = $request->arr;
              $response = $this->mediaRepo->deleteAll($data);
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
                 $obj = $this->mediaRepo->find($k);
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
             $cate = $this->mediaRepo->find($id);
             $cate->status = $value;
             $cate->save();
             return response()->json([
                 'mes' => 'Updated',
                 'error'=> false,
             ], 200);
         }
     }
}

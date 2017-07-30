<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class PageController extends Controller
{
    protected $pageRepo;
    protected $common;
    public function __construct(PageRepository $page, CommonRepository $common)
    {
        $this->pageRepo = $page;
        $this->common = $common;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $inst = $this->pageRepo->all();

        return view('Admin::pages.static_page.index');
    }

    public function getData(Request $request)
    {
        $page = DB::table('pages')->select(['id','page_name', 'status']);
            return Datatables::of($page)
            ->addColumn('action', function($page){
                return '<a href="'.route('admin.page.edit', $page->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
                <form method="POST" action=" '.route('admin.page.destroy', $page->id).' " accept-charset="UTF-8" class="inline-block-span">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.page.destroy', $page->id).' " onclick="confirm_remove(this);" > Remove </button>
               </form>' ;
           })->addColumn('status', function($page){
               $status = $page->status ? 'checked' : '';
               $page_id =$page->id;
               return '
                 <label class="toggle">
                    <input type="checkbox" name="status" value="1" '.$status.'   data-id ="'.$page_id.'">
                    <span class="handle"></span>
                  </label>
              ';
           })->filter(function($query) use ($request){
            if (request()->has('name')) {
                $query->where('page_name', 'like', "%{$request->input('name')}%");
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
        return view('Admin::pages.static_page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'slug' => \LP_lib::unicode($request->input('page_name')),
            'page_name' => $request->input('page_name'),
            'content' => $request->input('content'),
        ];
        $this->pageRepo->create($data);
        return redirect()->route('admin.page.index')->with('success','Created !');
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
        $inst = $this->pageRepo->find($id);
        return view('Admin::pages.static_page.edit', compact('inst'));
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
          'title' => $request->input('title'),
          'slug' => \LP_lib::unicode($request->input('page_name')),
          'page_name' => $request->input('page_name'),
          'content' => $request->input('content'),
          'status' => $request->input('status'),
        ];
        $this->pageRepo->update($data, $id);
        return redirect()->route('admin.page.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pageRepo->delete($id);
        return redirect()->route('admin.page.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
             $data = $request->arr;
             $response = $this->pageRepo->deleteAll($data);
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
                $obj = $this->pageRepo->find($k);
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
            $cate = $this->pageRepo->find($id);
            $cate->status = $value;
            $cate->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}

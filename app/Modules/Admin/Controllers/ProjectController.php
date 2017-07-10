<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\Eloquent\CommonRepository;

class ProjectController extends Controller
{
    protected $projectRepo;
    protected $_removePath1 = '/laravel-filemanager/';

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inst = $this->projectRepo->all();
        return view('Admin::pages.project.index', compact('inst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CommonRepository $common)
    {
        $order = $this->projectRepo->getOrder();
        $img_url = $common->getPath($request->input('img_url'), $this->_removePath1);
        $data = [
          'video_id' => $request->input('video_id'),
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'img_url' => $img_url,
          'order' => $order,
        ];
        $this->projectRepo->create($data);
        return redirect()->route('admin.project.index')->with('success','Create Successful.');
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
        $inst = $this->projectRepo->find($id);
        return view('Admin::pages.project.edit', compact('inst'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CommonRepository $common,  $id)
    {
        $status =  $request->has('status') ? 1 : 0 ;
        $img_bk = $this->projectRepo->find($id)->img_url;
        $img_url = $request->input('img_url') != $img_bk ? $common->getPath($request->input('img_url')) : $img_bk ;
        $data = [
            'video_id' => $request->input('video_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img_url' => $img_url,
            'order' => $request->input('order'),
            'status' => $status,
        ];
        if($this->projectRepo->update($data, $id)){
            return redirect()->route('admin.project.index')->with('success', 'Update Successful.');
        }
            return redirect()->route('admin.project.index')->with('error', 'Update Fail.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->projectRepo->delete($id)){
          return redirect()->back()->with('success', 'Delete Successful.');
        }
          return redirect()->back()->with('success', 'Delete Fail.');
    }

    // DELETE ALL
    public function deleteAll(Request $request)
    {
      if(!$request->ajax()){
        abort(404, 'No Permission');
      }else{
        $data = $request->input('arr');
        $this->projectRepo->deleteAll($data);
        return redirect()->route('admin.project.index')->with('success','Item Deleted.');
      }
    }
}

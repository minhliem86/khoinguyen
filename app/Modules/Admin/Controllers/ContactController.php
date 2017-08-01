<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use Datatables;
use DB;

class ContactController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactRepository $contact)
    {
      $this->contactRepo = $contact;
    }

    public function index()
    {
      return view('Admin::pages.contact.index');
    }

    public function getData(Request $request)
    {
      $contact = DB::table('contacts')->select('id', 'fullname', 'readable');
      return Datatables::of($contact)
          ->addColumn('action', function($contact){
              return '<a href="'.route('admin.contact.show', $contact->id).'" class="btn btn-info btn-xs inline-block-span"> View </a>
              <form method="POST" action=" '.route('admin.contact.destroy', $contact->id).' " accept-charset="UTF-8" class="inline-block-span">
                  <input name="_method" type="hidden" value="DELETE">
                  <input name="_token" type="hidden" value="'.csrf_token().'">
                             <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.contact.destroy', $contact->id).' " onclick="confirm_remove(this);" > Remove </button>
             </form>' ;
         })->editColumn('readable', function($contact){
             $readable = $contact->readable ? 'checked' : '';
             return '
              <div class="checkboxbyme-wrap">
                <input id="check" type="checkbox" name="readable" '.$readable.' disabled>
                <label for="check">Read</label>
              </div>
            ';
         })->filter(function($query) use ($request){
          if (request()->has('name')) {
              $query->where('fullname', 'like', "%{$request->input('name')}%");
          }
      })->setRowId('id')->make(true);
    }

    public function show($id)
    {
      $inst = $this->contactRepo->find($id);
      $this->contactRepo->update(['readable' => 1], $id);
      return view('Admin::pages.contact.edit', compact('inst'));
    }

    public function destroy($id)
    {
      $this->contactRepo->delete($id);
      return redirect()->route('admin.contact.index')->with('success', 'Deleted !');
    }

    /* DELETE ALL */
    public function deleteAll()
    {
      if(!$request->ajax()){
          abort(404);
      }else{
           $data = $request->arr;
           $response = $this->contactRepo->deleteAll($data);
           return response()->json(['msg' => 'ok']);
      }
    }
}

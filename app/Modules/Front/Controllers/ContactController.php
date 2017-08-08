<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use Validator;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        return view('Front::pages.contact');
    }

    public function postRegister(Request $request)
    {
        $rule = [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $err_mes = [
            'fullname.required' => 'Vui lòng nhập Họ tên',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Vui lòng nhập định dạng email',
            'phone.required' => 'Vui lòng nhập Số điện thoại',
        ];
        $valid = Validator::make($request->all(),$rule, $err_mes);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $data = [
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ];
            $this->contact->create($data);

            return redirect()->back()->with('success','done');
        }
    }
}

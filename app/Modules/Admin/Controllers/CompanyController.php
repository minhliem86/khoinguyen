<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    public function getInformation(CompanyRepository $companyRepo, Request $request)
    {
      if($request->input('btn-submit')){

      }
      $inst = $companyRepo->getFirst();
      return view('Admin::pages.company.index', compact('inst'));
    }
}

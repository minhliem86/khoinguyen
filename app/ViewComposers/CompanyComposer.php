<?php
namespace App\ViewComposers;
use Illuminate\View\View;
use App\Repositories\CompanyRepository;

class CompanyComposer
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

	  public function compose(View $view)
    {
      $company_info = $this->company->getFirst();
      $location = explode(',', $company_info->map);
      $view->with(['company'=>$company_info, 'location' => $location]);
    }
}

<?php
namespace App\ViewComposers;
use Illuminate\View\View;
use App\Repositories\CompanyRepository;

class BannerComposer
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

	public function compose(View $view)
    {
        
    }
}

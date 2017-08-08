<?php
namespace App\ViewComposers;
use Illuminate\View\View;
use App\Repositories\ProductRepository;
use App\Repositories\SupportRepository;

class LeftPanelComposer
{
    protected $product;
    protected $support;

    public function __construct(ProductRepository $product, SupportRepository $support)
    {
        $this->product = $product;
        $this->support = $support;
    }

	  public function compose(View $view)
    {
        $hot_product = $this->product->findByField('hot',1);
        $support = $this->support->getSupportOnLeftPanel();
        $view->with(['hot_product'=>$hot_product, 'support' => $support]);
    }
}

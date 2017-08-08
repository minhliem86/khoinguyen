<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Repositories\ProductRepository;

class PageController extends Controller
{
    public $pageRepo;
    public $productRepo;

    public function __construct(PageRepository $page, ProductRepository $product)
    {
        $this->pageRepo = $page;
        $this->productRepo = $product;
    }
    public function homepage()
    {
        // $home = $this->pageRepo->findByField('slug','home',['content']);
        $product = $this->productRepo->getProductOnHome();
        return view('Front::pages.home', compact ('product'));
    }

    public function about()
    {
        $about = $this->pageRepo->firstByField('slug','about', ['content']);
        return view('Front::pages.about', compact('about'));
    }
}

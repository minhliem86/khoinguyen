<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reporsitories\PageRepository;
use App\Reporsitories\ProductRepository;

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
        $home = $this->pageRepo->findByField('slug','home',['content']);
        $product = $this->productRepo->getProductOnHome();
        dd($product);
        return view('Front::pages.home', compact('home'));
    }
}

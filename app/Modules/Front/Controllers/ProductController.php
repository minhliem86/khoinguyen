<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $product = $this->product->getPaginateProductOnProduct(9,['title','avatar_img','price','slug']);
        return view('Front::pages.product', compact('product'));
    }

    public function getDetail($slug)
    {
        $product = $this->product->getFirstProduct('slug', $slug,['photos']);

        $product_relate = $this->product->findWhereNotIn('id', [$product->id],['avatar_img','title','slug', 'price']);
        return view('Front::pages.product-detail', compact('product', 'product_relate'));
    }
}

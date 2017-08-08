<?php
namespace App\ViewComposers;
use Illuminate\View\View;
use App\Repositories\MediaRepository;

class BannerComposer
{
    protected $media;

    public function __construct(MediaRepository $media)
    {
        $this->media = $media;
    }
    public function compose(View $view)
    {
      $banner = $this->media->getBannerOnHome();
      $view->with(['banner'=>$banner]);
    }
}

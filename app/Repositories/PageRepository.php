<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Page;

class PageRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Page::class;
    }

    public function firstByField($field, $value, $columns = ['*'])
    {
        return $this->model->where($field,'=',$value)->first($columns);
    }
  // END
}

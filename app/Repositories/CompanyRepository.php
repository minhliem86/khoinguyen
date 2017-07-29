<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Company;

class CompanyRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Company::class;
    }

    public function getFirst($data = [])
    {
      $inst = $this->model->first();
      if($inst){
        return false;
      }
      return $inst;
    }
  // END
}

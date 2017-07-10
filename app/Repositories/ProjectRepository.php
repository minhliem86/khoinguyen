<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Project;

class ProjectRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Project::class;
    }
  // END
}

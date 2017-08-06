<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Media;

class MediaRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Media::class;
    }
  // END
}

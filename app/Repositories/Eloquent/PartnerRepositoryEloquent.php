<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\PartnerRepository;
use App\Models\Partner;
use App\Validators\PartnerValidator;

/**
 * Class PartnerRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Partner::class;
    }

    public function getPartnersById($slug)
    {
        $data = Partner::where('position', $slug)->get();
        return   $data;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

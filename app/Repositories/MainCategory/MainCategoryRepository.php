<?php

namespace App\Repositories\MainCategory;

use App\Models\MainCategory;
use App\Foundation\Repository\Eloquent\BaseRepository;

class MainCategoryRepository extends BaseRepository implements MainCategoryRepositoryInterface 
{
    public function __construct(MainCategory $model)
    {
        parent::__construct($model);
    }


}
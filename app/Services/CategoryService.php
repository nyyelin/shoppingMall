<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\MainCategory\MainCategoryRepositoryInterface;

class CategoryService extends CommonService{

    protected $item_repo;
   

    public function __construct(MainCategoryRepositoryInterface $item_repo)
    {
        $this->item_repo = $item_repo;
       
    }

    public function getAllItemCats() {
        return $this->item_repo->getAll();
    }

    public function makeItemCatDtCollection($request) 
    {
        $action = [

            'canEdit' => true,
            'canDelete' => true
        ];

        $count = $this->item_repo->totalCount();

        $params = collect($this->requestParams(request()))->toArray();

        $filteredCnt = $this->item_repo->totalCount($params);

        $itemCategories = $this->item_repo->getAll($params);
        
        $data = $itemCategories->map(function ($itemCat) use ($action) {
            return [
                'action' => $action,
                'uuid' => $itemCat->uuid,
                'name' => $itemCat->name ?? '---',
            ];
        })->toArray();

        return [
            'recordsTotal' => $count,
            'draw' => request('draw'),
            'recordsFiltered' => $filteredCnt,
            'data' => $data,
        ];
    }

   

    public function createMainCategory($data)
    {
        
      return $this->item_repo->insert($data);
    }

   

    public function getItemCategoryByUuid($id)
    {
        return $this->item_repo->getDataByUuid($id);
    }

    



    public function mainCategoryUpdate($data, $id)
    {
        
       return  $this->item_repo->update($data, $id);
    }

   
   


}

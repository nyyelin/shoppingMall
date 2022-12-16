<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use DB;

class MainCategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service) {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.mainCategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $inputs  = $request->only('name');
        
       
        DB::beginTransaction();
        try {
            $this->service->createMainCategory($inputs);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            errorLogger($e->getMessage(), $e->getFile(), $e->getLine());
            return back();
        }

        return redirect()->route('main-category.index')->with(['success' => 'Successfully added!']);


    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $category = $this->service->getItemCategoryByUuid($uuid);
        
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $inputs  = $request->only('name');
        $category = $this->service->getItemCategoryByUuid($uuid);
    
        DB::beginTransaction();
        try {
            $this->service->mainCategoryUpdate($inputs, $category->id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            errorLogger($e->getMessage(), $e->getFile(), $e->getLine());
            return back();
        }

        return redirect()->route('main-category.index')->with(['success' => 'Successfully Updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $mainCategory)
    {
        //
    }

    public function getAjaxMainCategory(Request $request) 
    {
        return response()->json($this->service->makeItemCatDtCollection($request));
    }
}

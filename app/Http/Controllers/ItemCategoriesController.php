<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemCategoriesRequest;
use App\Http\Requests\UpdateItemCategoriesRequest;
use App\Repositories\ItemCategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItemCategoriesController extends AppBaseController
{
    /** @var  ItemCategoriesRepository */
    private $itemCategoriesRepository;

    public function __construct(ItemCategoriesRepository $itemCategoriesRepo)
    {
        $this->itemCategoriesRepository = $itemCategoriesRepo;
    }

    /**
     * Display a listing of the ItemCategories.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itemCategoriesRepository->pushCriteria(new RequestCriteria($request));
        $itemCategories = $this->itemCategoriesRepository->paginate(50);

        return view('item_categories.index')
            ->with('itemCategories', $itemCategories);
    }

    /**
     * Show the form for creating a new ItemCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('item_categories.create');
    }

    /**
     * Store a newly created ItemCategories in storage.
     *
     * @param CreateItemCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateItemCategoriesRequest $request)
    {
        $input = $request->all();

        $itemCategories = $this->itemCategoriesRepository->create($input);

        Flash::success('Item Categories saved successfully.');

        return redirect(route('item_categories.index'));
    }

    /**
     * Display the specified ItemCategories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemCategories = $this->itemCategoriesRepository->findWithoutFail($id);

        if (empty($itemCategories)) {
            Flash::error('Item Categories not found');

            return redirect(route('item_categories.index'));
        }

        return view('item_categories.show')->with('itemCategories', $itemCategories);
    }

    /**
     * Show the form for editing the specified ItemCategories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemCategories = $this->itemCategoriesRepository->findWithoutFail($id);

        if (empty($itemCategories)) {
            Flash::error('Item Categories not found');

            return redirect(route('item_categories.index'));
        }

        return view('item_categories.edit')->with('itemCategories', $itemCategories);
    }

    /**
     * Update the specified ItemCategories in storage.
     *
     * @param  int              $id
     * @param UpdateItemCategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemCategoriesRequest $request)
    {
        $itemCategories = $this->itemCategoriesRepository->findWithoutFail($id);

        if (empty($itemCategories)) {
            Flash::error('Item Categories not found');

            return redirect(route('item_categories.index'));
        }

        $itemCategories = $this->itemCategoriesRepository->update($request->all(), $id);

        Flash::success('Item Categories updated successfully.');

        return redirect(route('item_categories.index'));
    }

    /**
     * Remove the specified ItemCategories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $itemCategories = $this->itemCategoriesRepository->findWithoutFail($id);

        if (empty($itemCategories)) {
            Flash::error('Item Categories not found');

            return redirect(route('item_categories.index'));
        }

        $this->itemCategoriesRepository->delete($id);

        Flash::success('Item Categories deleted successfully.');

        return redirect(route('item_categories.index'));
    }
}

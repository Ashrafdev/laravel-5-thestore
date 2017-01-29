<?php

namespace App\Http\Controllers\API;

use App\Models\Items;
use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ItemsController
 * @package App\Http\Controllers\API
 */

class ItemsAPIController extends AppBaseController
{
    /** @var  ItemsRepository */
    private $itemsRepository;

    public function __construct(Items $Items)
    {
        $this->items = $Items;
    }

    /**
     * Display a listing of the Items.
     * GET|HEAD /items
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $items = $this->items->where('user_id', '=', $id)->paginate(20);

        return response()->json([
            'data' => $items,
            'message' => 'Items retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Items in storage.
     * POST /items
     *
     * @param CreateItemsAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $items = $this->items->create($input);

        return $this->sendResponse($items->toArray(), 'Items saved successfully');
    }

    /**
     * Display the specified Items.
     * GET|HEAD /items/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items = $this->items->where('id', '=', $id)->with('Users')->get()->first();

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        return $this->sendResponse($items, 'Items retrieved successfully');
    }

    /**
     * Update the specified Items in storage.
     * PUT/PATCH /items/{id}
     *
     * @param  int $id
     * @param UpdateItemsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $items = $this->items->findOrFail($id);

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        $items = $this->items->where('id', $id)->update($request->except(['token','_method']));

        return $this->sendResponse($items->toArray(), 'Items updated successfully');
    }

    /**
     * Remove the specified Items from storage.
     * DELETE /items/{id}
     *
     * @param  int $id
     *
     * @param Request $request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $items = $this->items->findOrFail($id);

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        $items->delete();

        return $this->sendResponse($id, 'Items deleted successfully');
    }
}

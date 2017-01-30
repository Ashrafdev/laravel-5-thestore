<?php

namespace App\Http\Controllers\API;

use App\Models\Items;
use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Webpatser\Uuid\Uuid;

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
        $file = $request->file('item_image');
        $path = $request->file('item_image')->store('items', 'global');

        $Items = new Items;
        $Items->id = Uuid::generate(4)->string;
        $Items->name = $request->item_name;
        $Items->description = $request->item_description;
        $Items->price = $request->item_price;
        $Items->img_path = $path;
        $Items->file_mime = $file->getMimeType();
        $Items->item_categories_id = $request->item_categories_id;
        $Items->user_id = $request->user_id;
        $Items->saveOrFail();

        return $this->sendResponse($Items->toArray(), 'Items saved successfully');
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
        $items = $this->items
            ->where('id', $id)
            ->where('user_id', $request->user_id);

        $file = $request->file('edit_item_image');
        $path = $request->file('edit_item_image')->store('items', 'global');

        if (empty($items)) {
            return $this->sendError('Items not found or Invalid request');
        }

        $items = $items->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img_path' => $path,
            'file_mime' => $file->getMimeType(),
            'item_categories_id' => $request->item_categories_id,
        ]);

        return $this->sendResponse($items, 'Items updated successfully');
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

    public function createItemAndUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'mobile' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response('error', 400);
        }

        $file = $request->file('item_image');
        $path = $request->file('item_image')->store('items', 'global');

        $Users = new Users;
        $Users->id = Uuid::generate(5, $request->email, Uuid::NS_DNS)->string;
        $Users->name = $request->name;
        $Users->dob = $request->dob;
        $Users->gender = $request->gender;
        $Users->mobile = $request->mobile;
        $Users->email = $request->email;
        $Users->password = bcrypt($request->password);
        $Users->role_id = 2; //user role
        $Users->save();

        $Items = new Items;
        $Items->id = Uuid::generate(4)->string;
        $Items->name = $request->item_name;
        $Items->description = $request->item_description;
        $Items->price = $request->item_price;
        $Items->img_path = $path;
        $Items->file_mime = $file->getMimeType();
        $Items->item_categories_id = $request->item_categories_id;
        $Items->user_id = $Users->id;
        $Items->save();

        return response()->json(['message' => 'success']);
    }
}

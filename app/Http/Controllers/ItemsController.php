<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use App\Repositories\ItemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\Fractal\Resource\Item;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Webpatser\Uuid\Uuid;
use App\Models\Users;
use App\Models\Items;

class ItemsController extends AppBaseController
{
    /** @var  ItemsRepository */
    private $itemsRepository;

    public function __construct(ItemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * Display a listing of the Items.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itemsRepository->pushCriteria(new RequestCriteria($request));
        $items = $this->itemsRepository->paginate(50);

        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new Items.
     *
     * @return Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created Items in storage.
     *
     * @param CreateItemsRequest $request
     *
     * @return Response
     */
    public function store(CreateItemsRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        Flash::success('Items saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified Items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            return redirect(url('/'))->with('warning', 'Items not found');
        }

        return view('items.show')->with(compact('items'));
    }

    /**
     * Show the form for editing the specified Items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        return view('items.edit')->with('items', $items);
    }

    /**
     * Update the specified Items in storage.
     *
     * @param  int              $id
     * @param UpdateItemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemsRequest $request)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        $items = $this->itemsRepository->update($request->all(), $id);

        Flash::success('Items updated successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified Items from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        $this->itemsRepository->delete($id);

        Flash::success('Items deleted successfully.');

        return redirect(route('items.index'));
    }

    public function validateItemPost(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255',
            'item_description' => 'required|max:255',
            'item_price' => 'required|integer',
            'item_categories_id' => 'required|integer',
            'email' => 'required|email|max:255|unique:users',
            'dob' => 'required|date',
            'gender' => 'required',
            'country' => 'required',
            'mobile' => 'required|integer',
            'password' => 'required|min:6|confirmed',
            'item_image' => 'required|image',
        ]);
    }

    //public

    public function storeByUser(Request $request)
    {
        $this->validateItemPost($request);

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

        return redirect(url('/'))->with('success', 'Items saved successfully.');
    }

    public function createByUser()
    {
        return view('post_item.index');
    }

    public function indexForUser(Request $request)
    {
        if (!Auth::check()) {
            redirect('/')->with('error', 'You Not Authorized Please Login');
        }

        $items = Items::with('Users')->where('Items.user_id', '=', Auth::user()->id)->get();

//        foreach ($items as $item) {
//            dd($item);
//        }

        return view('items.index')->with('items', $items);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Repositories\UsersRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Webpatser\Uuid\Uuid;

/**
 * Class UsersController
 * @package App\Http\Controllers\API
 */

class UsersAPIController extends AppBaseController
{
    use ValidatesRequests;


    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(Users $Users)
    {
        $this->users = $Users;
    }

    /**
     * Display a listing of the Users.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
//    public function index(Request $request)
//    {
//        $this->usersRepository->pushCriteria(new RequestCriteria($request));
//        $this->usersRepository->pushCriteria(new LimitOffsetCriteria($request));
//        $users = $this->usersRepository->all();
//
//        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
//    }

    /**
     * Store a newly created Users in storage.
     * POST /users
     *
     * @param CreateUsersAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'mobile' => 'required',
        ]);

        $users = $this->users->create([
                'id' => Uuid::generate(5, $request->email, Uuid::NS_DNS)->string,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'dob' => date('Y-m-d', strtotime($request->dob)),
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'role_id' => 2 // role for users
        ]);

        return $this->sendResponse($users->toArray(), 'Users saved successfully');
    }

    /**
     * Display the specified Users.
     * GET|HEAD /users/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->users->findOrFail($id);

        if (empty($users)) {
            return $this->sendError('Users not found');
        }

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
     * Update the specified Users in storage.
     * PUT/PATCH /users/{id}
     *
     * @param  int $id
     * @param UpdateUsersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $users = $this->users->findOrFail($id);

        if (empty($users)) {
            return $this->sendError('Users not found');
        }

        $users = $this->users->where('id', $id)->update($request->except(['token','_method']));

        return $this->sendResponse($users, 'Users updated successfully');
    }

    /**
     * Remove the specified Users from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->users->findOrFail($id);

        if (empty($users)) {
            return $this->sendError('Users not found');
        }

        $users->delete();

        return $this->sendResponse($id, 'Users deleted successfully');
    }
}

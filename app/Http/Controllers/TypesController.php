<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypesRequest;
use App\Http\Requests\UpdateTypesRequest;
use App\Repositories\TypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypesController extends AppBaseController
{
    /** @var  TypesRepository */
    private $typesRepository;

    public function __construct(TypesRepository $typesRepo)
    {
        $this->typesRepository = $typesRepo;
    }

    /**
     * Display a listing of the Types.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typesRepository->pushCriteria(new RequestCriteria($request));
        $types = $this->typesRepository->paginate(50);

        return view('types.index')
            ->with('types', $types);
    }

    /**
     * Show the form for creating a new Types.
     *
     * @return Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created Types in storage.
     *
     * @param CreateTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateTypesRequest $request)
    {
        $input = $request->all();

        $types = $this->typesRepository->create($input);

        Flash::success('Types saved successfully.');

        return redirect(route('types.index'));
    }

    /**
     * Display the specified Types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $types = $this->typesRepository->findWithoutFail($id);

        if (empty($types)) {
            Flash::error('Types not found');

            return redirect(route('types.index'));
        }

        return view('types.show')->with('types', $types);
    }

    /**
     * Show the form for editing the specified Types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $types = $this->typesRepository->findWithoutFail($id);

        if (empty($types)) {
            Flash::error('Types not found');

            return redirect(route('types.index'));
        }

        return view('types.edit')->with('types', $types);
    }

    /**
     * Update the specified Types in storage.
     *
     * @param  int              $id
     * @param UpdateTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypesRequest $request)
    {
        $types = $this->typesRepository->findWithoutFail($id);

        if (empty($types)) {
            Flash::error('Types not found');

            return redirect(route('types.index'));
        }

        $types = $this->typesRepository->update($request->all(), $id);

        Flash::success('Types updated successfully.');

        return redirect(route('types.index'));
    }

    /**
     * Remove the specified Types from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $types = $this->typesRepository->findWithoutFail($id);

        if (empty($types)) {
            Flash::error('Types not found');

            return redirect(route('types.index'));
        }

        $this->typesRepository->delete($id);

        Flash::success('Types deleted successfully.');

        return redirect(route('types.index'));
    }
}

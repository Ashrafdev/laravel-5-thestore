<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatesRequest;
use App\Http\Requests\UpdateStatesRequest;
use App\Repositories\StatesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatesController extends AppBaseController
{
    /** @var  StatesRepository */
    private $statesRepository;

    public function __construct(StatesRepository $statesRepo)
    {
        $this->statesRepository = $statesRepo;
    }

    /**
     * Display a listing of the States.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statesRepository->pushCriteria(new RequestCriteria($request));
        $states = $this->statesRepository->paginate(50);

        return view('states.index')
            ->with('states', $states);
    }

    /**
     * Show the form for creating a new States.
     *
     * @return Response
     */
    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created States in storage.
     *
     * @param CreateStatesRequest $request
     *
     * @return Response
     */
    public function store(CreateStatesRequest $request)
    {
        $input = $request->all();

        $states = $this->statesRepository->create($input);

        Flash::success('States saved successfully.');

        return redirect(route('states.index'));
    }

    /**
     * Display the specified States.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = $this->statesRepository->findWithoutFail($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        return view('states.show')->with('states', $states);
    }

    /**
     * Show the form for editing the specified States.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $states = $this->statesRepository->findWithoutFail($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        return view('states.edit')->with('states', $states);
    }

    /**
     * Update the specified States in storage.
     *
     * @param  int              $id
     * @param UpdateStatesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatesRequest $request)
    {
        $states = $this->statesRepository->findWithoutFail($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        $states = $this->statesRepository->update($request->all(), $id);

        Flash::success('States updated successfully.');

        return redirect(route('states.index'));
    }

    /**
     * Remove the specified States from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $states = $this->statesRepository->findWithoutFail($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        $this->statesRepository->delete($id);

        Flash::success('States deleted successfully.');

        return redirect(route('states.index'));
    }
}

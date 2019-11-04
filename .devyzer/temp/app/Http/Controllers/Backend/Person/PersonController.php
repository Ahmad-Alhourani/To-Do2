<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Person\CreatePerson;
use App\Http\Requests\Backend\Person\UpdatePerson;
use App\Repositories\Backend\PersonRepository;
use App\Events\Backend\Person\PersonCreated;
use App\Events\Backend\Person\PersonUpdated;
use App\Events\Backend\Person\PersonDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Person;

class PersonController extends Controller
{
    /** @var $manRepository */
    private $manRepository;

    public function __construct(PersonRepository $manRepo)
    {
        $this->manRepository = $manRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->manRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->manRepository->getPaginatedAndSortable(10);

        return view('backend.men.index')->with('men', $data);
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.men.create');
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePerson $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreatePerson $request)
    {
        $obj = $this->manRepository->create(
            $request->only(["name", "email", "sms"])
        );

        event(new PersonCreated($obj));
        return redirect()
            ->route('admin.man.index')
            ->withFlashSuccess(__('alerts.frontend.man.saved'));
    }

    /**
     * Display the specified Person.
     *
     * @param Person $man
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Person $man)
    {
        return view('backend.men.show')->with('man', $man);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param Person $man
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Person $man)
    {
        return view('backend.men.edit')->with('man', $man);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param UpdatePerson $request
     *
     * @param Person $man
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdatePerson $request, Person $man)
    {
        $obj = $this->manRepository->update($request->all(), $man);

        event(new PersonUpdated($obj));
        return redirect()
            ->route('admin.man.index')
            ->withFlashSuccess(__('alerts.frontend.man.updated'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param Person $man
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Person $man)
    {
        $obj = $this->manRepository->delete($man);
        event(new PersonDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.man.deleted'));
    }
}

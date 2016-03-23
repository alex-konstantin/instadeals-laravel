<?php

namespace App\Http\Controllers\Instadeal;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Models\Instadeals\Repositories\InstadealRepository;
use App\Models\Instadeals\Entities\Instadeal;

use App\Http\Controllers\RepositoryFilter;

class InstadealController extends Controller
{

    public $instadealRepo = null;
    protected $redirectTo = '/instadeal/list';
    public $repositoryFilter;

    public function __construct(InstadealRepository $instadealRepo, RepositoryFilter $repositoryFilter)
    {
        $this->instadealRepo = $instadealRepo;
        $this->repositoryFilter = $repositoryFilter;
    }

    public function index(Request $request)
    {
        $this->repositoryFilter->setOrderBy([
            'orderBy' => 'created',
            'orderDirection' => 'DESC'
        ]);

        if ($request->get('limit')) {
            $request->fullUrlWithQuery();
            $this->repositoryFilter->setPerPage($request->get('limit'));
        }

        $instadeals = $this->instadealRepo->getGridCollection(
            $this->repositoryFilter
        );

        return view('instadeal.list', array('instadeals' => $instadeals));
    }

    public function edit(Request $request, $id)
    {
        $instadeal = $this->instadealRepo->find($id);
        return view('instadeal.update', array('instadeal' => $instadeal));
    }

    public function update(Request $request)
    {
        $instadeal = $this->instadealRepo->find($request->input('id'));
        $data = $instadeal->saveData($request->all());

        if (!$data) {
            return Redirect::back()->withInput()->with('message','Please input valid address using http or https.');
        }

        return redirect($this->redirectTo);
    }

    public function create()
    {
        return view('instadeal.create');
    }

    public function store(Request $request)
    {
        $instadeal = new Instadeal();
        $data = $instadeal->saveData($request->all());

        if (!$data) {
            return Redirect::back()->withInput()->with('message','Please input valid address using http or https.');
        }

        return redirect($this->redirectTo);
    }

    public function delete(Request $request)
    {
        $this->instadealRepo->find($request->id)->remove();
        return redirect($this->redirectTo);
    }
}
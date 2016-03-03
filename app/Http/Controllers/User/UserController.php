<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Users\Repositories\UserRepository;
use App\Models\Users\Entities\User;

use App\Helpers\Md5Hasher;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

use App\Http\Controllers\RepositoryFilter;


class UserController extends Controller
{
    public $userRepo = null;
    protected $redirectTo = '/user/list';
    public $hasher = null;
    public $repositoryFilter;

    public function __construct(UserRepository $userRepo, RepositoryFilter $repositoryFilter, Md5Hasher $hasher)
    {
        $this->userRepo = $userRepo;
        $this->repositoryFilter = $repositoryFilter;
        $this->hasher = $hasher;
    }

    public function index(Request $request)
    {
        $users = $this->userRepo->getGridCollection(
            $this->repositoryFilter->prepareFromRequest($request)
        );

        return view('user.list', array('users' => $users));
    }

    public function edit(Request $request, $id)
    {
        $user = $this->userRepo->find($id);
        return view('user.update', array('user' => $user));
    }

    public function update(Request $request)
    {
        $user = $this->userRepo->find($request->input('id'));

        $user->setUsername($request->input('username'))
            ->setEmail($request->input('email'));

        if ($request->has('password')){
            $user->setPassword($this->hasher->make($request->input('password')));
        }
        $user->save();
        return redirect($this->redirectTo);

    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->setEmail($request->input('email'))
            ->setUsername($request->input('username'))
            ->setPassword($this->hasher->make($request->input('password')));

        $user->save();

        return redirect($this->redirectTo);
    }

}
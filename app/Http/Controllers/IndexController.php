<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Instadeals\Entities\Instadeal;
use App\Models\Instadeals\Repositories\InstadealRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\InstadealData;

class IndexController extends Controller
{

    public $instadealRepo = null;

    public function __construct(InstadealRepository $instadealRepository)
    {
        $this->instadealRepo = $instadealRepository;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect('/instadeal/list');
        }

        $defaultUrl = app()->make('instadealData')->getDefaultUrl($request);
        $brand = app()->make('instadealData')->getBrand($request);

        $deal = $request->get('deal');
        $redirectUrl = $this->instadealRepo->getRedirectUrl($deal, $brand);

        if (is_object($redirectUrl) && $redirectUrl->getResultRedirectUrl()) {
            return redirect($redirectUrl->getResultRedirectUrl());
        }

        // If there is no result in database, redirect to default
        return redirect($defaultUrl);
    }
}
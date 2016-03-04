<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Instadeals\Entities\Instadeal;
use App\Models\Instadeals\Repositories\InstadealRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $deal = $request->get('deal');
        $instadeal = new Instadeal();
        list($defaultUrl, $brand) = $instadeal->getDefaultUrlAndBrand($request);

        $redirectUrl = $this->instadealRepo->getRedirectUrl($deal, $brand);

        // If there is no result in database, redirect to default
        if (is_object($redirectUrl) && $redirectUrl->getResultRedirectUrl()) {
            return redirect($redirectUrl->getResultRedirectUrl());
        } else {
            return redirect($defaultUrl);
        }
    }
}
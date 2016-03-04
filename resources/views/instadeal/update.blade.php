@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Instadeal</div>
                    <div class="panel-body">
                        <form class="form-horizontal instadeal-update" role="form" method="POST" action="{{ url('/instadeal/update') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" class="form-control" name="id" value="{{$instadeal->getId()}}">

                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('instadeal') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Instadeal Id</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="instadeal" value="{{$instadeal->getInstadeal()}}">

                                    @if ($errors->has('instadeal'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('instadeal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Brand</label>

                                <div class="col-md-6">
                                    {{--<input type="text" class="form-control" name="brand" value="{{$instadeal->getBrand()}}">--}}
                                    <select name="brand">
                                        <option value="{{$instadeal->getBrand()}}" selected>{{$instadeal->getBrand()}}</option>
                                        <option value="nume">nume</option>
                                        <option value="belletto">belletto</option>
                                    </select>

                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('redirect_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Redirect Url</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="redirect_url" value="{{$instadeal->getRedirectUrl()}}" required>

                                    @if ($errors->has('redirect_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('redirect_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('utm_source') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">utm_source</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="utm_source" value="{{$instadeal->getUtmSource()}}">

                                    @if ($errors->has('utm_source'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('utm_source') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('utm_medium') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">utm_medium</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="utm_medium" value="{{$instadeal->getUtmMedium()}}">

                                    @if ($errors->has('utm_medium'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('utm_medium') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('utm_term') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">utm_term</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="utm_term" value="{{$instadeal->getUtmTerm()}}">

                                    @if ($errors->has('utm_term'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('utm_term') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('utm_content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">utm_content</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="utm_content" value="{{$instadeal->getUtmContent()}}">

                                    @if ($errors->has('utm_content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('utm_content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('utm_campaign') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">utm_campaign</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="utm_campaign" value="{{$instadeal->getUtmCampaign()}}">

                                    @if ($errors->has('utm_campaign'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('utm_campaign') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('coupon_code') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Coupon Code</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="coupon_code" value="{{$instadeal->getCouponCode()}}">

                                    @if ($errors->has('coupon_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('coupon_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('instadeal_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Instadeal Url</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="instadeal_url" readonly="readonly" value="{{$instadeal->getInstadealUrl()}}">

                                    @if ($errors->has('instadeal_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('instadeal_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('result_redirect_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Result Redirect Url</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="result_redirect_url" readonly="readonly" value="{{$instadeal->getResultRedirectUrl()}}">

                                    @if ($errors->has('result_redirect_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('result_redirect_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('created') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Created At</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="created" readonly="readonly" value="{{date('m/d/y',strtotime($instadeal->getCreated()))}}">

                                    @if ($errors->has('created'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('created') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-camera"></i>Update Instadeal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

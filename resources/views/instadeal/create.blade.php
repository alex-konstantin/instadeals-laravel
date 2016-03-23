@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Instadeal</div>
                    <div class="panel-body">
                        <form class="form-horizontal instadeal-create" role="form" method="POST" action="{{ url('/instadeal/create') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" class="form-control" name="id">

                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif
                            
                            <div class="form-group{{ $errors->has('instadeal') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Instadeal Id</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="instadeal" required>
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
                                    <select name="brand" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand }}">{{ $brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('redirect_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Redirect Url</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="redirect_url" required pattern="https?://.+">
                                    <div class="small">http://example.com or https://example.com</div>

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
                                    <input type="text" class="form-control" name="utm_source">

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
                                    <input type="text" class="form-control" name="utm_medium">

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
                                    <input type="text" class="form-control" name="utm_term">

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
                                    <input type="text" class="form-control" name="utm_content">

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
                                    <input type="text" class="form-control" name="utm_campaign">

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
                                    <input type="text" class="form-control" name="coupon_code">

                                    @if ($errors->has('coupon_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('coupon_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-camera"></i>Create Instadeal
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

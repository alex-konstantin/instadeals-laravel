@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary" href="/instadeal/create/"><i class="fa fa-user fa-fw"></i> Create Instadeal</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{ Request::fullUrlWithQuery(['limit'=>50]) }}">50</a></li>
                    <li><a href="{{ Request::fullUrlWithQuery(['limit'=>100]) }}">100</a></li>
                    <li><a href="{{ Request::fullUrlWithQuery(['limit'=>200]) }}">200</a></li>
                </ul>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Instadeal Id</th>
                            <th>Brand</th>
                            <th>Created At</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($instadeals as $instadeal)
                            <tr>
                                <td>{{$instadeal->getInstadeal()}}</td>
                                <td>{{$instadeal->getBrand()}}</td>
                                <td>{{date('m/d/y',strtotime($instadeal->getCreated()))}}</td>
                                <td>
                                    <a href="<?php echo '/instadeal/update/id/' . $instadeal->getId() ?>">EDIT</a>
                                </td>
                                <td>
                                    <a href="<?php echo '/instadeal/delete/id/' . $instadeal->getId() ?>">DELETE</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3">No instadeals</td>

                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                    {!! $instadeals->render() !!}
                </ul>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary" href="/user/create/"><i class="fa fa-user fa-fw"></i> Create User</a>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$user->getUsername()}}</td>
                                <td>{{$user->getEmail()}}</td>
                                <td>
                                    <a href="<?php echo '/user/update/id/' . $user->getId() ?>">EDIT</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3">No users</td>

                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                    {!! $users->render() !!}
                </ul>
            </div>
        </div>
    </div>

@endsection
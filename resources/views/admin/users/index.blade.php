@extends('admin.master')

@section('title', 'ADMIN-USERS')

@section('main')
    <div class="container">

        <h1>USERS</h1>

        <div class="row ">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Second Name</th>
                                <th scope="col">Functions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->is_admin == 0)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>Edit, block, delete</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection

@extends('admin.master')

@section('title', 'ADMIN-USERS')

@section('main')
    <div class="container">

        <hr>

        <h1>USERS</h1>

        <hr>

{{--        <a class="btn btn-success" type="button" href="{{ route('software.create') }}">ADD SOFTWARE</a>--}}

        <hr>

        <div class="row ">
            @foreach($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p>id: {{ $user->id }} | name: {{ $user->name }}</p>
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div class="btn-group">--}}
{{--                                    <a href="{{ route('software.show', $soft) }}"><button type="button" class="btn btn-link">SHOW</button></a>--}}
{{--                                    <a href="{{ route('software.edit', $soft) }}"><button type="button" class="btn btn-link">EDIT</button></a>--}}
{{--                                </div>--}}
{{--                                <form id="delete-form" action="{{ route('software.destroy', $soft) }}" method="POST">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-primary">DELETE</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> <!-- /container -->
@endsection

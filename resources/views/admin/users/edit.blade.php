@extends('admin.master')

@section('title', 'EDIT ' . $software->name)

@section('content')
    <div class="container">

        <hr>

        <h1>EDIT SOFTWARE</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('software.update', $software) }}">
            <div>
                @method('PUT')
                @csrf

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">NAME</span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $software->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">IMAGE</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>

                <button class="btn btn-success">EDIT</button>

                <hr>
            </div>
        </form>

    </div> <!-- /container -->
@endsection

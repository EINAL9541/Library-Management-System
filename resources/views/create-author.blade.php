@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    @if(session('message'))
    <div class="alert alert-default-info">
        {{ session('message') }}
    </div>
    @endif

    <form class="container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="{{route('create-author')}}" method="POST">
        @csrf
        @method('post')
        <h1 class="text-primary">Author</h1>
        <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">


            <div class="form-group">
                <label for="name" class="text-primary mt-3">Add Author Name</label>

                <input type="text" class="form-control" name="name" id="name" placeholder="Author Name">
                @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Add</button>


        </div>

    </form>
</div>
@endsection
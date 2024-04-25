@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    @if(session('message'))
    <div class="alert alert-default-info">
        {{ session('message') }}
    </div>
    @endif

    <form class="container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="{{route('create-book')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <h1 class="text-primary">Book</h1>
        <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">

        <div class="form-group">
                <label for="image" class="text-primary mt-3">Image</label>
                <input type="file" class="form-control pt-1" id="image" name="image" >
                @if ($errors->has("image"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('image') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="name" class="text-primary mt-3">Book Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Book name">
                @if ($errors->has("name"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('name') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
          
            
            <div class="form-group">
                <label for="category" class="text-primary mt-3">Category</label>
                <select class="form-control" id="category" name="category">
                    <option disabled selected>Select a category</option>

                    @foreach ($categories as $category)
                    @if (old('category') == $category->id)
                    <option value="{{ $category->id }}" name="category"  selected>{{ $category->name }}</option>
                    @else
                    <option value="{{$category->id }}" name="category">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>

                @if ($errors->has("category"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('category') }}
                    </li>
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="author" class="text-primary mt-3">Author Name</label>
                <select class="form-control" id="author" name="author">
                    <option disabled selected>Select a author name</option>

                    @foreach ($authors as $author)
                    @if (old('author') == $author->id)
                    <option value="{{ $author->id }}" name="author" selected>{{ $author->name }}</option>
                    @else
                    <option value="{{$author->id }}" name="author">{{ $author->name }}</option>
                    @endif
                    @endforeach
                </select>

                @if ($errors->has("author"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('author') }}
                    </li>
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="summary" class="text-primary mt-3">Review</label>
                <textarea class="form-control" id="summary" name="review" rows="3"></textarea>

                @if ($errors->has("review"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('review') }}
                    </li>
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Add</button>

            
        </div>

    </form>
</div>
@endsection
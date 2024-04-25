
@extends('layouts.login')

@section('content')

@if(session('error'))
    <div class="alert alert-default-info">
        {{ session('error') }}
    </div>
    @endif

    <form class="container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="{{route('loginPostPost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-primary">Login</h1>
        <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">

            


            <div class="form-group">
                <label for="phone" class="text-primary mt-3">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                @if ($errors->has("phone"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('phone') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="text-primary mt-3">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                @if ($errors->has("password"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('password') }}
                    </li>

                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Login</button>


        </div>

    </form>
</body>
</html>

@endsection
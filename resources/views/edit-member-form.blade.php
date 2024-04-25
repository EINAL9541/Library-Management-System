@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    @if(session('message'))
    <div class="alert alert-default-info">
        {{ session('message') }}
    </div>
    @endif

    <form class="container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="{{ url("/admin/update-member/$member->id") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <h1 class="text-primary">Member</h1>
        <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">

            <div class="form-group">
                <label for="name" class="text-primary mt-3">Member Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Member name" value="{{$member->name}}">
                @if ($errors->has("name"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('name') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="age" class="text-primary mt-3">Age</label>
                <input type="number" class="form-control" id="age" min="0" max="100" name="age" placeholder="Age" value="{{$member->age}}">
                @if ($errors->has("age"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('age') }}
                    </li>
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="address" class="text-primary mt-3">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$member->address}}">
                @if ($errors->has("address"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('address') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="phone" class="text-primary mt-3">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{$member->phone}}">
                @if ($errors->has("phone"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('phone') }}
                    </li>

                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="expiry_date" class="text-primary mt-3">Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Expiry Date" min="{{$member->expiry_date}}" value="{{$member->expiry_date}}">
                @if ($errors->has("expiry_date"))
                <div class="text-danger">
                    <li>
                        {{ $errors->first('expiry_date') }}
                    </li>

                </div>
                @endif
            </div>


            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Update</button>


        </div>

    </form>
</div>
@endsection
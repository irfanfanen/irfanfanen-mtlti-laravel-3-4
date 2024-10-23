@extends('layouts.app')
 
<!-- Section -->
@section('content')
    
    <h1>Add Excavator</h1>
    
    <form action="{{ route('excavators.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">Model</label>
            <input type="text" name="model" class="form-control">
            @if ($errors->has('model'))
                {{$errors->first('model')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">Lat</label>
            <input type="text" name="latitude" class="form-control">
            @if ($errors->has('latitude'))
                {{$errors->first('latitude')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">Long</label>
            <input type="text" name="longitude" class="form-control">
            @if ($errors->has('longitude'))
                {{$errors->first('longitude')}}
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('excavators.index')}}" class="btn btn-secondary">Back</a>

    </form>

@endsection
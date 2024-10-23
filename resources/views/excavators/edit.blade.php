@extends('layouts.app')
 
<!-- Section -->
@section('content')
    
    <h1>Edit Excavator</h1>

    <form action="{{ route('excavators.update', $excavator)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $excavator->name }}">
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div><br>

        <div>
            <label for="">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $excavator->model }}">
            @if ($errors->has('model'))
                {{$errors->first('model')}}
            @endif
        </div><br>

        <div>
            <label for="">Lat</label>
            <input type="text" class="form-control" name="latitude" value="{{ $excavator->latitude }}">
            @if ($errors->has('latitude'))
                {{$errors->first('latitude')}}
            @endif
        </div><br>

        <div>
            <label for="">Long</label>
            <input type="text" class="form-control" name="longitude" value="{{ $excavator->longitude }}">
            @if ($errors->has('longitude'))
                {{$errors->first('longitude')}}
            @endif
        </div><br>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('excavators.index')}}" class="btn btn-secondary">Back</a>

    </form>

@endsection
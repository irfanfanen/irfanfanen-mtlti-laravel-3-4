@extends('layouts.app')
 
<!-- Section -->
@section('content')
    
    <h1>Add Excavator</h1>
    <a href="{{ route('excavators.index')}}">Back</a>
    
    <br><br>

    <form action="{{ route('excavators.store')}}" method="POST">
        @csrf

        <div>
            <label for="">Name</label>
            <input type="text" name="name">
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div><br>

        <div>
            <label for="">Model</label>
            <input type="text" name="model">
            @if ($errors->has('model'))
                {{$errors->first('model')}}
            @endif
        </div><br>

        <button type="submit">Save</button>
    </form>

@endsection
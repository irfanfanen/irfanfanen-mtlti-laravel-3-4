@extends('layouts.app')
 
<!-- Section -->
@section('content')
    
    <h1>Show Excavator</h1>
    <a href="{{ route('excavators.index')}}">Back</a>
    
    <br><br>

   <p>Name: {{$excavators->name}} </p>
   <p>Model: {{$excavators->model}} </p>
@endsection
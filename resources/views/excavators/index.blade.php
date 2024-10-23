@extends('layouts.app')
 
<!-- Section -->
@section('content')
    
    <h1>List Excavator</h1>
    <a href="{{ route('excavators.create')}}" class="btn btn-primary">Add New</a>

    @if (session('success'))
        <p>{{session('success')}} </p>
    @endif

    <br><br>

    <table id="excavator" class="table table-striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Model</td>
                <td>Status</dr>
                <td>Location</td>
                <td>Lat</td>
                <td>Long</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ( $excavators as $excavator)
                <tr>
                    <td>{{ $excavator->name }}</td>
                    <td>{{ $excavator->model }}</td>
                    <td>{{ $excavator->status }}</td>
                    <td>{{ $excavator->location }}</td>
                    <td>{{ $excavator->latitude }}</td>
                    <td>{{ $excavator->longitude }}</td>
                    <td>
                        <a href="{{ route('excavators.show', $excavator)}}">View</a>
                        <a href="{{ route('excavators.edit', $excavator)}}">Edit</a>
                        
                        <form
                            action="{{ route('excavators.show', $excavator)}}"
                            method="POST"
                            style="display:inline;"
                        > 
                        @csrf
                        @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script>
    $( document ).ready(function() {        
        $('#excavator').DataTable();
    });
</script>
@endsection
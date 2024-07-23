@extends('dashboard.core.layout')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Car</h1>
    <form action="{{ route('dashboard.car.update', $car->id) }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $car->name }}">
        </div>
        <button class="btn btn-sm btn-block btn-success" type="submit">UPDATE</button>
    </form>
</div>

@endsection

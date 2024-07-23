@extends('dashboard.core.layout')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Create Car's Model</h1>
    <form action="{{ route('dashboard.car-model.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="car_id">Car</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach                    
            </select>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" >

        </div>
        <button class="btn btn-sm btn-block btn-primary" type="submit">CREATE</button>
    </form>
</div>

@endsection

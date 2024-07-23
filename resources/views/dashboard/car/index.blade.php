@extends('dashboard.core.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h1 class="h3 mb-2 text-gray-800">Cars</h1>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('dashboard.car.index.trash') }}" class="btn btn-secondary rounded-pill" type="submit">
                        Trash
                    </a>  
                </div>

                <div class="col-md-4">
                    <a href="{{ route('dashboard.car.create') }}" class="btn btn-primary" type="submit">
                        Create
                    </a>                    
                </div>
            </div>
        </div>
    </div>


    <form action="" method="GET">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ request()->name }}" id="name" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="creator">Creator</label>
                    <input type="text" name="creator" value="{{ request()->creator }}" id="creator" class="form-control">
                </div>
            </div>

            <div class="col-md-3 mt-2">

                <button class="btn btn-sm btn-info mt-4" type="submit">
                    <li class="fa fa-magnifying-glass"></li>
                </button>

                <a href="{{ route("dashboard.car.refresh") }}" class="btn btn-sm btn-info mt-4" type="submit">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>

            </div>
        </div>
    </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Creator</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cars as $car)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$car->name}}</td>
        <td>{{$car->creator}}</td>
        <td>{{date( "d-m-Y", strtotime($car->created_at))}}</td>
        <td>
            <a href="{{route("dashboard.car.edit",$car->id)}}" class="btn btn-sm btn-primary">
                <i class="fa fa-pen"></i>
            </a>
            <a href="{{route("dashboard.car.delete",$car->id)}}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </a>
        </td>
      </tr>
      @endforeach 
    </tbody>
</table>

{{ $cars->links() }}

</div>
@endsection
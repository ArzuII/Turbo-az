@extends('dashboard.core.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h1 class="h3 mb-2 text-gray-800">Advertisements</h1>
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

            <div class="col-md-3 mt-2">

                <button class="btn btn-sm btn-info mt-4" type="submit">
                    <li class="fa fa-magnifying-glass"></li>
                </button>

            </div>
        </div>
    </form>

    <table class="table table-light table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Applier</th>
            <th>Car</th>
            <th>Model</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($advertisements as $advertisement)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $advertisement->creator }}</td>
                    <td>{{ $advertisement->car}}</td>
                    <td>{{ $advertisement->model}}</td>
                    <td>{{ $advertisement->price}}</td>
                    <td>{{ $advertisement->created_at }}</td>
                    <td>{{ $advertisement->statusLabel}}</td>
                    <td>
                        <a href="{{ route('dashboard.advertisement.show', $advertisement->id) }}" class="btn btn-sm btn-info">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('dashboard.advertisement.approve', $advertisement->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-check"></i>
                        </a> 

                        <a href="{{ route('dashboard.advertisement.reject', $advertisement->id) }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-x"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

        {{ $advertisements->links() }}

</div>
@endsection
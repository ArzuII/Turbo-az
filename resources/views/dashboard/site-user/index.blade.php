@extends('dashboard.core.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h1 class="h3 mb-2 text-gray-800">Site registered users</h1>
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
{{-- 
                <a href="{{ route("dashboard.car-model.refresh") }}" class="btn btn-sm btn-info mt-4" type="submit">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a> --}}

            </div>
        </div>
    </form>

    <table class="table table-light table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created At</th>
            <th>Email Verified At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->phone}}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->email_verified_at}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

        {{ $users->links() }}

</div>

@endsection
@extends('layouts.admin')

@section('content')
    <ul class="breadcrumb">
      <li><a href="{{ url('/home') }}">Dashboard</a></li>
      <li class="active">Penulis</li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Penulis</h2>
      </div>

      <div class="panel-body">
        <table class="table">
          <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="2">
              <a href="{{ route('authors.create') }}" class="btn btn-primary btn-block">Tambah</a>
            </th>
          </tr>
          </thead>
          <tbody>
          @foreach($authors as $author)
            <tr>
              <td>{{ $author->id }}</td>
              <td>{{ $author->name }}</td>
              <td width="80">
                <a class="btn btn-primary" href="{{ route('authors.edit', $author->slug) }}">Edit</a>
              </td>
              <td width="80">
                <form method="POST" action="{{route('authors.destroy', $author->id)}}" accept-charset="UTF-8">
                  <input name="_method" type="hidden" value="DELETE">
                  {!! csrf_field() !!}
                  <input class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>

        {!! $authors->render() !!}

      </div>
    </div>
@endsection

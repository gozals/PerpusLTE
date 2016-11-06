@extends('layouts.admin')

@section('content')
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li><a href="{{ url('/admin/authors') }}">Penulis</a></li>
          <li class="active">Ubah Penulis</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Ubah Penulis</h2>
          </div>

          <div class="panel-body">
            <form action="{{route('authors.update', $author->id)}}" method="POST" class="form-horizontal">
              <input name="_method" type="hidden" value="PUT">
              {!! csrf_field() !!}
              @include('authors._form')
            </form>
          </div>
        </div>
@endsection


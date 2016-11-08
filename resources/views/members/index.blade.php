@extends('layouts.admin')

@section('content')

  <ul class="breadcrumb">
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="active">Member</li>
  </ul>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Member</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <p> <a class="btn btn-primary" href="{{ url('/admin/members/create') }}">Tambah</a> </p>
      {!! $html->table(['class'=>'table table-bordered table-striped']) !!}
    </div>
    <!-- /.box-body -->
  </div>
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection


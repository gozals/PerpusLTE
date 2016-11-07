@extends('layouts.admin')

@section('content')
  <div class="box">
  <div class="box-header">
    <h3 class="box-title">List Buku</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! $html->table(['class'=>'table table-bordered table-striped']) !!}
  </div>
  <!-- /.box-body -->
  </div>

@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection


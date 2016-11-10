@extends('layouts.admin')

@section('content')
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Buku</li>
        </ul>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Buku</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>
              <a class="btn btn-primary" href="{{ url('/admin/books/create') }}">Tambah</a>
              <a class="btn btn-primary" href="{{ url('/admin/export/books') }}">Export</a>
            </p>
            {!! $html->table(['class'=>'table table-bordered table-striped']) !!}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection


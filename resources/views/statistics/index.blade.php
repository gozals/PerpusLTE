@extends('layouts.admin')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="active">Data Peminjaman</li>
  </ul>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Peminjaman</h3>
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
  <script>
    $(function() {
      $('\
        <div id="filter_status" class="dataTables_length" style="display: inline-block; margin-left:10px;">\
          <label>Status \
          <select size="1" name="filter_status" aria-controls="filter_status" \
            class="form-control input-sm" style="width: 140px;">\
              <option value="all" selected="selected">Semua</option>\
              <option value="returned">Sudah Dikembalikan</option>\
              <option value="not-returned">Belum Dikembalikan</option>\
            </select>\
          </label>\
        </div>\
      ').insertAfter('.dataTables_length');

      $("#dataTableBuilder").on('preXhr.dt', function(e, settings, data) {
        data.status = $('select[name="filter_status"]').val();
      });

      $('select[name="filter_status"]').change(function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
      });
    });
  </script>
@endsection


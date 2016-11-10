@extends('layouts.admin')
@section('content')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Profil</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table">
        <tbody>
        <tr>
          <td class="text-muted">Nama</td>
          <td>{{ auth()->user()->name }}</td>
        </tr>
        <tr>
          <td class="text-muted">Email</td>
          <td>{{ auth()->user()->email }}</td>
        </tr>
        <tr>
          <td class="text-muted">Login terakhir</td>
          <td>{{ auth()->user()->last_login }}</td>
        </tr>
        </tbody>
      </table>
      <a class="btn btn-primary" href="{{ url('/settings/profile/edit') }}">Ubah</a>
    </div>
    <!-- /.box-body -->
  </div>
@endsection


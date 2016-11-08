@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Dashboard</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            Selamat datang di PerpusLTE.
            <table class="table">
                <tbody>
                <tr>
                    <td class="text-muted">Buku dipinjam</td>
                    <td>
                        @if ($borrowLogs->count() == 0)
                            Tidak ada buku dipinjam
                        @endif
                        <ul>
                            @foreach ($borrowLogs as $borrowLog)
                                <li>
                                    {!! Form::open(['url' => route('member.books.return', $borrowLog->book_id),
                                            'method'       => 'put',
                                            'class'        => 'form-inline js-confirm',
                                            'data-confirm' => "Anda yakin hendak mengembalikan " . $borrowLog->book->title . "?"] ) !!}

                                    {{ $borrowLog->book->title }}
                                    {!! Form::submit('Kembalikan', ['class'=>'btn btn-xs btn-default']) !!}

                                    {!! Form::close() !!}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


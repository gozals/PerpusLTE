@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Display Name</th>
            <th>Name</th>
            <th colspan="2"><a href="{{ URL::route('permissions.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->display_name }}</td>
                <td>{{ $permission->name }}</td>
                <td width="80"><a class="btn btn-primary" href="{{ URL::route('permissions.edit', $permission->id) }}">Edit</a></td>
                <td width="80">{!! Form::open(['route' => ['permissions.update', $permission->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                    {!!  Form::close() !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $permissions->render() !!}

@stop
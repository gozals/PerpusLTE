@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Display Name</th>
            <th>Name</th>
            <th>Level</th>
            <th>Permissions</th>
            <th colspan="2"><a href="{{ URL::route('roles.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->level }}</td>
                <td>
                    @foreach($role->permissions as $permission)
                        <span class="label label-info">{{ $permission->name }}</span>
                    @endforeach
                </td>
                @if( $role->id != 1)
                    <td width="80"><a class="btn btn-primary" href="{{ URL::route('roles.edit', $role->id) }}">Edit</a></td>

                    <td width="80">
                        {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                        {!!  Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $roles->render() !!}

@stop
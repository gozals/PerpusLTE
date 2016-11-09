@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2"><a href="{{ URL::route('users.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        <span class="label label-info">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td width="80"><a class="btn btn-primary" href="{{ URL::route('users.edit', $user->id) }}">Edit</a></td>
                <td width="80">{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                    {!!  Form::close() !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

@stop
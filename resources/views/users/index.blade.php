@extends('layouts.app')

@section('content')
    

<h3>
    All Users
</h3>

<a href="{{route('users.create')}}" class="btn btn-dark mb-2">Add Users</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Names</th>
      <th scope="col">Email</th>
      <th scope="col">User Roles</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$loop->index + 1}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        @foreach($user->roles as $role)
        {{$role->name}}

        @endforeach
      </td>
      <td>
        <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-dark">View</a>
        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-dark">Edit</a>

        <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
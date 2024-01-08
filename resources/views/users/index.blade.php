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
      <th scope="col">Alias</th>
      <th scope="col">Account No</th>
      <th scope="col">User Roles</th>
      <th scope="col">Manager</th>
      <th scope="col">Company Name</th>
      <th scope="col">Api</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$loop->index + 1}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->alias}}</td>
      <td>{{$user->account_no}}</td>
      <td>
        @foreach($user->roles as $role)
        {{$role->name}}

        @endforeach
      </td>
      <td>{{$user->Manager}}</td>
      <td>{{$user->company_name}}</td>
      <td>{{$user->api}}</td>
      <td >
        <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-dark">View</a>
        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-primary">Edit</a>
        <br>
   
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
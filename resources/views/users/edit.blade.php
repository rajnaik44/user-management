@extends('layouts.app')

@section('content')

<h3>Edit User</h3>

<form action="{{Route('users.update' , $user->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
        @error('name')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}">
        @error('email')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    {{-- <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control">
        @error('password')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div> --}}

    <div class="form-group">
        <label for="roles">User Roles</label>

        <select class="form-control" name="roles[]">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}"
                    @if(in_array($role->id, $user->roles->pluck('id')->toArray()))
                        selected
                    @endif
                >{{ $role->name }}</option>
            @endforeach
        </select>
        @error('roles')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div><br>
    <button type="submit" class="btn btn-dark px-4">Update Users</button>

    

</form>



@endsection
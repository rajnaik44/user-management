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

    <div class="form-group">
        <label for="alias">Alias</label>
        <input type="text" name="alias" class="form-control" value="{{$user->alias}}">
        @error('alias')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="account_no">Account No</label>
        <input type="text" name="account_no" class="form-control" value="{{$user->account_no}}">
        @error('account_no')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" name="company_name" class="form-control" value="{{$user->company_name}}">
        @error('company_name')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="manager">Manager</label>
        <input type="text" name="manager" class="form-control" value="{{$user->manager}}">
        @error('manager')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="api">Api</label>
        <input type="text" name="api" class="form-control" value="{{$user->api}}">
        @error('api')
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
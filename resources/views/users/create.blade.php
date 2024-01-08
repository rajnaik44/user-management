@extends('layouts.app')

@section('content')

<h3>Add New User</h3>

<form action="{{Route('users.store')}}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
        @error('email')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control">
        @error('password')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>
    
    
    <!-------->
    <div class="form-group">
        <label for="alias">Alias</label>
        <input type="text" name="alias" class="form-control">
        @error('alias')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="account_no">Account No</label>
        <input type="text" name="account_no" class="form-control">
        @error('account_no')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" name="company_name" class="form-control">
        @error('company_name')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>

    <div class="form-group">
        <label for="company_name">Manager</label>
        <input type="text" name="manager" class="form-control">
        @error('manager')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>
    
    <div class="form-group">
        <label for="api">Api</label>
        <input type="text" name="api" class="form-control">
        @error('api')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div><br>
    
    <!-------->

    <div class="form-group">
        <label for="roles"> User Roles</label>

        <select class="form-control"  name="roles[]">
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>   
            @endforeach
        </select>
        @error('roles')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div><br>
    <button type="submit" class="btn btn-dark px-4">Create Users </button>

    

</form>



@endsection
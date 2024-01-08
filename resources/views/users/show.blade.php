@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Show User</div>
    <div class="card-body">
     
   
          <div class="card-body">
          <h5 class="card-title"> Name : {{ $user->name }}</h5>
          <p class="card-text"> Email : {{ $user->email }}</p>
          <p class="card-text"> User Roles:
            @foreach($user->roles as $role)
                {{ $role->name }}
                @if(!$loop->last)
                    
                @endif
            @endforeach
        </p>
    </div>
        
      </hr>
    
    </div>
  </div>




@endsection
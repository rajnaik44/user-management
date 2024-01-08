@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Show User</div>
    <div class="card-body">
     
   
          <div class="card-body">
          <h5 class="card-title"> Name : {{ $user->name }}</h5><br>
          <p class="card-text"> Email : {{ $user->email }}</p>
          <p class="card-text"> Alias : {{ $user->alias }}</p>
          <p class="card-text"> Account No : {{ $user->account_no }}</p>
          <p class="card-text"> Company Name : {{ $user->company_name }}</p>
          <p class="card-text"> Manager : {{ $user->manager }}</p>
          <p class="card-text"> Api : {{ $user->api }}</p>
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
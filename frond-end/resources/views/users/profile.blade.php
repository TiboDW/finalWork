@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('profile') }}</div>

               
                    <div class="card-body">
                        <h5 class="card-title">{{__($user->name)}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Born on: {{ date('d-m-Y', strtotime($user->birthday)) }}</h6>
                        <p class="card-text">{{__($user->bio)}}</p>
                        
                        @auth
                        @if($user->id == Auth::user()->id)
                        <a href="{{route('profileEdit', $user->id)}}" class="btn btn-primary btn-sm">edit profile</a>
                        @endif
                        @endauth 
                       
                    </div>
                

                
            </div>
        </div>
    </div>
</div>
@endsection
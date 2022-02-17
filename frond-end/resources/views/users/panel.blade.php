@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('User List') }}</div>

               
                    <div class="card-body">
                    
                        <h3>Make admin</h3>

                        <select class="form-select" aria-label="Default select example">

                        @foreach($users as $user)
                            <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                        </select>

                    </div>
                
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
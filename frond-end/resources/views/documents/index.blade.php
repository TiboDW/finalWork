@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Documents') }}</div>

                <div class="card-body">

                    @foreach($documents as $document)
                    <h3><a style="color: black;" href="{{ route('documents.show', $document->id) }}">{{$document->title}}</a></h3>
                    <p>{{$document->synopsis}}</p>
                    <small>Published by <a style="color: black;" href="{{route('profile', $document->user->name)}}">{{$document->user->name}}</a> on {{$document->created_at->format('d/m/Y')}}.</small><br>
                    <div class="form-group">
                    </div>
                    <hr>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
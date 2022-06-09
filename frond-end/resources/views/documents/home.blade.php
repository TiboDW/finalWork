@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>All documents: </h3>
            @foreach($documents as $document)
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <h3><a style="color: black;" href="{{ route('documents.show', $document->id) }}">{{$document->title}}</a></h3>
                    <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
                    <p class="mb-0 mt-2 font-italic">{{$document->synopsis}}</p>
                    <footer class="blockquote-footer pt-4 mt-4 border-top">Published by 
                        <cite title="Source Title"><a style="color: black;" href="{{route('profile', $document->user->name)}}">{{$document->user->name}}</a> on {{$document->created_at->format('d/m/Y')}}.</cite>
                    </footer>
                </blockquote><!-- END -->
            @endforeach

        </div>
    </div>
</div>
@endsection
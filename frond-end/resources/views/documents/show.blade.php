@extends('layouts.app')

<?php
    $json = $document->details;
    $obj = json_decode($json); 
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('document') }}</div>

                <div class="card-body">

                    <h3>{{$document->title}}</h3>
                    <h6 class="card-subtitle mb-2 text-muted">{{$document->synopsis}}</h6>
                    <div class="row justify-content-center">
                        <iframe src="/uploads/{{$document->file}}" width="50%" height="600">
                           
                        </iframe>
                    </div>
                    <small>Published by <a style="color: black;" href="{{route('profile', $document->user->name)}}">{{$document->user->name}}</a> on {{$document->created_at->format('d/m/Y')}}.</small><br>
                    <div class="form-group">
                        <h3>Document Details:</h3>
                        @if($obj->plagPercent < 50)
                            <p> NFT Token Address: 0xb33399138f964adadf31738c6c791d385bbb5e49</p>
                        @else
                            <p> No NFT Token address because your plag percentage was too high</p>
                        @endif
                        <h4>General details:</h4>
                        <p>plagPercentage: {{$obj->plagPercent}}%<p>
                        <p>unique percentage: {{$obj->uniquePercent}}%<p>
                        <p>percentage percentage: {{$obj->paraphrasePercent}}%<p>
                        <h4>Document details:</h4>

                        @foreach($obj->details as $detail)

                            <h6>sentence details:</h6>
                            <p>{{$detail->query}}</p>
                            <p>unique: {{$detail->unique}}</p>
                            <?php
                                $url = $detail->display;
                                $data = json_encode($url)
                                
                            ?>
                            <p>urls: {{$data}}</p> 
                            <hr>
                        @endforeach

                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
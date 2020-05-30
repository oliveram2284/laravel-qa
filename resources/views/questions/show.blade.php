@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{$question->title}}</h1>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back Questions</a>
                            </div>

                        </div>
                        
                    
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This question es useful" class="vote-up">
                                <i class="fa fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">1240</span>
                            <a title="This question is not usefull " class="vote-down off">
                                <i class="fa fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Click to mark as a Favorite Question (Click again to undo" class="favorite mt-2 favorited">
                                <i class="fa fa-star fa-2x"></i> 
                                <span class="favorites-count">1233</span>
                            </a>
                            
                        </div>
                        <div class="media-body pl-5 pr-5">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">
                                    Answered {{$question->created_date}}
                                </span>
                                <div class="media-body mt-2">
                                    <a href="{{$question->user->url}}" class="pr-2">
                                        <img src="{{$question->user->avatar}}" alt="">
                                    </a>
                                    <div class="media_body mt-1">
                                    <a href="{{$question->user->url}}" >{{$question->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    @include('answers._index',[
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ])
    @include('answers._create',[
    
    ]);
</div>
@endsection
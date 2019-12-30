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

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    <h2>{{$question->answers_count. " ". str_plural('Answer',$question->answers_count)}}</h2>
                    </div>
                </div>
                <hr>
                @foreach ( $question->answers as $answer )
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This answer es useful" class="vote-up">
                                <i class="fa fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">1240</span>
                            <a title="This answer is not usefull " class="vote-down off">
                                <i class="fa fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Mark this as best answer" class="vote-accepted mt-2 ">
                                <i class="fa fa-check fa-2x"></i> 
                            </a>
                            
                        </div>
                        <div class="media-body pl-4 pr-4 ">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">
                                    Answered {{$answer->created_date}}
                                </span>
                                <div class="media mt-2">
                                    <a href="{{$answer->user->url}}" class="pr-2">
                                        <img src="{{$answer->user->avatar}}" alt="">
                                    </a>
                                    <div class="media_body mt-1">
                                    <a href="{{$answer->user->url}}" >{{$answer->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

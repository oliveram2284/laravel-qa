@if($model instanceof App\Question)
    @php
        $name = 'question';
        $firtURISegement = 'questions';
    @endphp
@else
    @php
        $name = 'answer';
        $firtURISegement = 'answers';
    @endphp
@endif
@php
    $formId = $name."-".$model->id;
    $formAction = "/".$firtURISegement."/".$model->id."/vote";
@endphp
<div class="d-flex flex-column vote-controls">
    <a href="" title="This {{ $name }} es useful" class="vote-up 
    {{Auth::guest() ? 'off':''}}"
    onclick="event.preventDefault();document.getElementById('up-vote-{{ $formId }}').submit();"
    >
        <i class="fa fa-caret-up fa-2x"></i>
    </a>
    <form id="up-vote-{{ $formId }}" action="{{ $formAction }}" method="POST" style="display:none">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="votes-count">{{$model->votes_count}}</span>
    <a title="This {{ $name }} is not usefull " class="vote-down 
    {{Auth::guest() ? 'off':''}}"
    onclick="event.preventDefault();document.getElementById('down-vote-{{ $formId }}').submit();"
    >
        <i class="fa fa-caret-down fa-2x"></i>
    </a>
    <form id="down-vote-{{ $formId }}" action="{{ $formAction }}" method="POST" style="display:none">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>
    
    
    @if ($model instanceof App\Question)
        <a title="Click to mark as a Favorite {{ $name }} (Click again to undo)" class="favorite mt-2 {{ Auth::guest() ? 'off' :( $model->is_favorited ? 'favorited':'')}}"
            onclick="event.preventDefault();document.getElementById('favorite-{{ $name }}-{{$model->id}}').submit();"   >
            <i class="fa fa-star fa-2x"></i> 
            <span class="favorites-count">{{$model->favorites_count}}</span>
        </a>
        <form id="favorite-{{ $name }}-{{$model->id}}" action="/{{ $firtURISegement }}/{{$model->id}}/favorites" method="POST" style="display:none">
            @csrf
            @if ($model->is_favorited)
                @method('DELETE');
            @endif
        </form>
    @elseif ($model instanceof App\Answer)
        @include('shared._accept',[
            'model'=>$model
        ]);

    @endif

</div>
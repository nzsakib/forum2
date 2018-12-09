@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#"> {{ $thread->creator->name }} </a> posted: 
                    {{ $thread->title }}
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(auth()->check())
                <form method="post" action="{{ $thread->path() . '/replies' }}">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="5" placeholder="Have something to say?" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            @else 
                <div class="text-center">
                    Please <a href="{{ route('login') }}">Sign In</a> to participate in discussion
                </div>
            @endif
        </div>
    </div>

</div>
@endsection

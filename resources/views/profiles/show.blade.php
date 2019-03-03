@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $profileUser->name }}
                <small>{{ $profileUser->created_at->diffForHUmans() }}</small>
            </h1>
        </div>
        <hr>

        @foreach ($threads as $thread)
            <article>
                <div class="level">
                    <h4 class="flex">
                        <a href="{{ $thread->path() }}"> {{ $thread->title }} </a>
                    </h4>
                    
                    <span>{{ $thread->created_at->diffForHumans() }}</span>
                </div>
                <div class="body">
                    {{ $thread->body }}
                </div>
            </article>
            <hr>
        @endforeach

        {{ $threads->links() }}
    </div>
@endsection
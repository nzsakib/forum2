@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="page-header">
                <h1>
                    {{ $profileUser->name }}
                    <small> Since {{ $profileUser->created_at->diffForHUmans() }}</small>
                </h1>
            </div>
            <hr> 
            @forelse ($activities as $date => $activity)
                <h3 class="page-header">{{ $date }}</h3>
                @foreach($activity as $record)
                    @if(view()->exists("profiles.activities.{$record->type}"))
                        @include("profiles.activities.{$record->type}", ['activity' => $record])
                    @endif
                    <br>
                @endforeach
            @empty 
                <p>There is no activity for this user</p>
            @endforelse 
        </div>
    </div>
</div>
@endsection
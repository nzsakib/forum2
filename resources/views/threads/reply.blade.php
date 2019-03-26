<br>
<div id="reply-{{ $reply->id }}" class="card">
    <div class="card-header">
        <div class="level">
            <h5 class="flex">
                <a href="{{ route('profile', $reply->owner) }}" class="flex">
                    {{ $reply->owner->name }}
                </a> said
                {{ $reply->created_at->diffForHumans() }} ...
            </h5>
            
            <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                @csrf
                <button type="submit" class="btn btn-primary" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                    {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                </button>
            </form>
            
        </div>
        
    </div>

    <div class="card-body">
        {{ $reply->body }}
    </div>

    @can('update', $reply)
        <div class="card-footer">
            <form action="/replies/{{ $reply->id }}" method="POST">
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    @endcan
</div>
@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>
        <p>{{ $comment->body }}</p>
    </div>
@endforeach
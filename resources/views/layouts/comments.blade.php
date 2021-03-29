@foreach ($project->comments as $comment)
    <div class="d-flex py-2">
        <div class="">
            <img src="/storage/cover_images/{{$comment->user->avatar}}" alt="" class="rounded-circle shadow-sm" 
            style="width:50px; height:50px; object-fit:cover;">
        </div>
        <div class="ml-3 w-100">
            <div class="d-flex mb-2">
                <p class="font-weight-bold font-size-12 my-0">{{$comment->user->name}}</p>
                <p><p class="text-muted font-size-12 ml-2 my-0">{{$comment->created_at->diffForHumans()}}</p></p>
            </div>
            <p class="font-size-13">{{$comment->body}}</p>
        </div>  
    </div>
@endforeach
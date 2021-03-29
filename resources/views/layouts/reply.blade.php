
<div class="container shadow">
    <form method="POST" action="/reply/{{$apply->id}}" class=" p-0 d-flex justify-content-center">
        {{ csrf_field() }}
        <textarea class="form-control border-0" name="body" id="body" rows="3" placeholder="Message"></textarea>
        <div class="m-auto pr-2">
            <button type="submit" class="btn btn-primary ml-3">Send</button>
        </div>
    </form>
</div>

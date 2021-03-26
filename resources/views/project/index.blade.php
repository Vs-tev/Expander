@extends('layouts.master')
@section('content')

<div class="col-10 mt-3 mx-auto">
    @include('layouts.profile')
</div>
<div class="col-10 mx-auto d-flex mt-3">

    @include('layouts.sidebar')
    <div class="col-9 pl-3 pr-0">
        <div class="d-flex align-items-center justify-content-start border shadow-sm bg-white p-3">
            <i class="material-icons large-i yellow">lightbulb_outline</i>
            <a class="pt-2 mx-auto" href="/create">
                <h5>Share your thoughts or ideas for product or bussines <br>
                    <small class="text-muted">and find the support that you needed for</small>
                </h5>
            </a>
        </div>

        @if (count($projects))
        <p class="font-weight-bold mt-4">My Posts</p>
        @foreach ($projects as $project)
        
        <div class="project-container border rounded mb-3 shadow-sm">
            <div class="d-flex bg-light">
                <div class="dropdown ml-auto px-3">
                    <a id="projectDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="material-icons">linear_scale</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="projectDropdown">
                        <a href="/project/{{$project->id}}" class="dropdown-item">Edit Project</a>
                        <a href="/destroy/{{$project->id}}" class="dropdown-item">Delete Project</a>
                    </div>
                </div>
            </div>

            <div class="d-flex px-3 align-content-center justify-content-between bg-light">
                <div class="d-flex align-content-start">
                    <div>
                        <i class="material-icons mt-1" style="font-size: 22px">lightbulb_outline</i>
                    </div>
                    <div class="ml-2">
                        <h3 class="font-weight-bold p-0 my-auto mb-0">{{$project->project_name}}</h3>
                        <p class="">{{$project->started_at->toFormattedDateString()}}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <h6><span class="badge badge-primary p-2 rounded-0 font-weight-500">{{$project->progress}}</span>
                    </h6>
                    <p class=""></p>
                </div>

            </div>
            <div class="px-3 pb-1 bg-light" style="max-height: 50px;  ">
                <div class="p-1">
                    <p style="overflow:hidden; height:45px;">{{$project->description}}</p>
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <img class="m-auto" src="/storage/cover_images/{{$project->cover_image}}" alt=""
                    style="width:100%;height:300px; object-fit:cover">
            </div>
            <div class="bg-light px-3 py-4">
                @if ($project->recivedAppyings() > 0)
                <a href="/applications/{{$project->id}}" class="d-flex align-items-center">
                    <p class="mx-2 my-auto text-muted">Applyings</p><span class="font-weight-600">{{$project->recivedAppyings()}}</span>
                </a>     
                @else
                <p class="text-muted px-2 my-auto">No applyings</p>
                @endif
            
            </div>
            @if (count($project->comments))
            <div>
                <div class="py-2 px-4">
                    <p class="my-auto"><a data-toggle="collapse" data-target="#id{{$project->id}}" href="/">
                            {{count($project->comments)}} Comments</a></p>
                </div>
            </div>
            <hr class="mx-3 my-0">
            @endif
            <div class="d-flex py-1 px-3">
                <a class="d-flex py-1 px-2 text-muted" data-toggle="collapse" data-target="#id{{$project->id}}"
                    href="/">
                    <i class="material-icons">chat_bubble_outline</i>
                    <p class="pl-1 m-auto">Comment</p>
                </a>
                <div class="d-flex ml-auto py-1 px-2 text-muted">
                    <i class="material-icons">location_on</i>
                    <p class="m-auto">{{$project->city}}, {{$project->country}}</p>
                </div>
            </div>

            <hr class="mx-3 my-0">
            <div class="collapse commentar px-3 py-3" id="id{{$project->id}}">
                <form method="POST" action="/comments/{{$project->id}}" class="d-flex border p-2 mb-2"
                    style="border-radius: 10px">
                    {{ csrf_field() }}
                    <textarea class="form-control border-0" name="body" id="body" rows="1"
                        placeholder="Comment..."></textarea>
                    <div class="m-auto">
                        <button type="submit" class="btn btn-primary ml-2">Post</button>
                    </div>
                </form>
                @include('layouts.comments')
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div>
@endsection
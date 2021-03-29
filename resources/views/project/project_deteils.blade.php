@extends('layouts.master')
@section('content')
@include('apply.apply')

<div class="container col-12 col-md-9 m-auto ">
    <div class=" mt-3">
        <a href="/profile/{{$project->user->id}}" class="d-flex align-items-center">
            <img src="/storage/cover_images/{{$project->user->avatar}}" alt="John Doe" class="rounded-circle shadow-sm"
                style="width:100px; height:100px; object-fit:cover; border: 4px solid white">
            <div class="ml-2">
                <h4 class="font-weight-600">{{$project->user->name}}</h4>
                <h5 class="text-muted">{{$project->user->ProfileExtention->occupation ?? 'Occupation:'}}</h5>
            </div>
        </a>
    </div>
    <hr>
    <div class="col-12 p-0 m-auto">

        <div class="d-md-flex mt-4">
            <h5 class=" p-0 m-0">{{$project->project_name}}/ </h5>
            <div class="p-0 m-0 text-muted">({{$project->help}})</div>
        </div>
        <h6><span class="badge badge-primary p-2 rounded-0 font-weight-500">{{$project->progress}}</span></h6>

        <div class="d-flex">
            <p>Founded on:</p>&nbsp;
            <p>{{$project->started_at->toFormattedDateString()}}</p>
        </div>
        <div class="mx-auto p-0">
            <img class="m-auto" src="/storage/cover_images/{{$project->cover_image}}" alt=""
                style="width:100%; min-height:300px; object-fit:cover">
        </div>
        <div class="my-3">
            <p class="py-2 font-size-16">{{$project->description}}</p>
        </div>

        <div class="d-flex">
            <p class="font-size-16 text-muted">Branch:</p>&nbsp;
            <p class="font-size-16">{{$project->branch}}</p>
        </div>

        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <p class="text-muted font-size-16">Website:</p>&nbsp;
                <a href="{{$project->website}}" class="font-size-16" target="_blank">{{$project->website}}</a>
            </div>
            <a href="#" class="d-inline-flex py-1 text-muted">
                <i class="material-icons blue small-i">location_on</i>
                <p class="m-0 p-0">{{$project->city}}, {{$project->country}}</p>
            </a>
        </div>
        <hr class="my-2 p-0">
        @if ($project->user->id !== Auth::user()->id)
        <div class="d-flex align-items-baseline my-4">
            @if ($project->hasApplied())
            <button class="d-inline-flex btn btn-light border font-weight-600" disabled>
                Applied {{$project->applies->created_at->diffForHumans()}}&nbsp;
                <i class="material-icons " style="color: var(--blue)">check_circle</i>
            </button>
            @else
            <a class="d-inline-flex btn btn-primary font-weight-600" href="#apply_modal" data-toggle="modal">
                <i class="material-icons small-i">check</i>&nbsp;
                Apply
            </a>
            @endif
            <i class="material-icons ml-auto">bookmark_border</i>
        </div>
        @endif
        @if (count($project->comments))
        <div class="my-4 mx-3">
            <a class="font-weight-600" href="#">
                {{count($project->comments)}} Comments</a>
        </div>
        @endif
        <hr>
        <div class="commentar pb-3">
            @auth
            <form method="POST" action="/comments/{{$project->id}}" class="d-flex border p-2 mb-2"
                style="border-radius: 10px">
                {{ csrf_field() }}
                <textarea class="form-control border-0" name="body" id="body" rows="1"
                    placeholder="Comment..."></textarea>
                <div class="m-auto">
                    <button type="submit" class="btn btn-primary ml-2">Post</button>
                </div>
            </form>
            @endauth

            @include('layouts.comments')
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
<div class="">


    <div class="container myapplayings my-3">
        <div class="row b ">
            <div class="col-4 bg-white p-0 m-0">

                <div class="list-group conversations border border-top-0 rounded-0">
                    <div class="d-flex justify-content-between border-top border-bottom-0">
                    <h5 class="font-weight-600 ml-3 my-auto py-4">My Applyings </h5>
                    <h5 class="font-weight-600 mr-3 my-auto">{{$myapplyings->count()}}</h5>
                    </div>
                    @foreach ($myapplyings as $apply)
                    <a href="#id{{$apply->project->id}}"
                        class="list-group-item border-left-0 border-right-0 list-group-item-action d-flex align-content-center rounded-0"
                        data-toggle="tab">
                        <img src="/storage/cover_images/{{$apply->project->user->avatar}}" alt=""
                            class="rounded-circle shadow-sm"
                            style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                        <span class="ml-2 my-auto">
                            <h6 class="p-0 m-0 font-weight-600">
                                {{$name = strlen($apply->project->project_name) > 24 ? substr($apply->project->project_name, 0, 24). "..." : $apply->project->project_name}}
                            </h6>
                        </span>
                        <small class="light ml-auto my-auto">{{$apply->apply_body->last()->created_at->diffForHumans()}}</small>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="col-8 tab-content bg-white border border-left-0 border-right-0 p-0 m-0 ">
                <div id="home" class="m-0 p-0 tab-pane active">
                    <div class="m-4">
                        <h2 class="text-center text-muted fonwt-eight-600">Select Apply</h2>
                    </div>
                </div>

                @foreach ($myapplyings as $apply)
                    <div id="id{{$apply->project->id}}" class="row p-0 m-0 main tab-pane fade">
                        <div class="scrollable col">
                            <div class="d-flex ml-2 mt-3 mb-5">
                                <img src="/storage/cover_images/{{$apply->project->user->avatar}}" alt=""
                                    class="rounded-circle shadow-sm"
                                    style="width:45px; height:45px; object-fit:cover; border: 4px solid white">

                                <div class="flex-grow-1 ml-2 mr-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="d-flex">
                                                <h5 class="my-0">{{$apply->project->project_name}} /</h5>
                                                <h5 class="blue">&nbsp;{{$apply->project->help}}</h5> 
                                            </div>
                                            <a href="profile/{{$apply->project->user->id}}">
                                                <h6 class="my-0">{{$apply->project->user->name}}</h6>
                                            </a>
                                        </div>

                                        <p>Branch: <span>{{$apply->project->branch}}</span></p>
                                    </div>
                                    <div class="d-flex align-items-center bg-light border mt-4">
                                        <div class="">
                                            <p class="font-weight-600 m-3">Where:</p>
                                            <p class="font-weight-600 m-3">Published:</p>
                                            <p class="font-weight-600 m-3">Stage of development:</p>
                                        </div>
                                        <div class="">
                                            <p class="m-3">{{$apply->project->city}},{{$apply->project->website}}</p>
                                            <p class="m-3">{{$apply->project->created_at->diffForHumans()}}</p>
                                            <p class="m-3">{{$apply->project->progress}}</p>
                                        </div>
                                    </div>
                                    <div class="col-9 mx-auto mt-4 p-0">
                                        <img class="m-auto" src="/storage/cover_images/{{$apply->project->cover_image}}" alt=""
                                            style="width:100%; height:250px; object-fit:cover">
                                    </div>
                                    <div class="py-2 mt-4">
                                        <h6 class="my-auto font-weight-600">Description</h6>
                                        @if (strlen($apply->project->description) > 250)
                                        <p>{{ substr($apply->project->description, 0, 250) }} 
                                            <span class="dots">...</span>
                                            <span class="collapse"
                                                id="descriptionToggle">{{substr($apply->project->description, 250)}}</span>
                                        </p>
                                        <a href="#" onclick="$('.dots').toggle();" class="" data-toggle="collapse"
                                            data-target="#descriptionToggle">Show/Hide</a>
                                        @else
                                        <p>{{$apply->project->description}}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="font-weight-600 text-center">Conversation</h5>
                            @foreach ($apply->apply_body as $item)

                        
                            <div class="d-flex col-11 align-items-between mt-4 mx-auto">
                                <img src="/storage/cover_images/{{$item->user->avatar}}" alt="" class="rounded-circle shadow-sm"
                                    style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                                <div>
                                    <div class="d-flex align-items-center ml-3">
                                        <h6 class="my-auto font-weight-600">{{$item->user->name}}</h6>
                                        <p class="my-auto ml-2 text-muted font-weight-600">
                                            {{$item->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="mr-4 ml-3 mt-2 p-0 body-message">
                                        <p style="">{{$item->body}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="reply_container col">
                            @include('layouts.reply')
                        </div>
                        
                    </div>
                @endforeach 

                {{-- <div id="home" class="row m-0 p-0 tab-pane active">
                    <div class="col-12  border gore">
                        <h2 class="text-center text-muted fonwt-eight-600">Select Apply</h2>
                    </div>
                    <div class="col-12  border dolu">
                        <h2 class="text-center text-muted fonwt-eight-600">dolnoto Apply</h2>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
</div>
@endsection
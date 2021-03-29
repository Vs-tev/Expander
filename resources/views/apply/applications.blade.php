@extends('layouts.master')
@section('content')
<div class="container mt-3">
    <div class="row my-auto">
        <div class="d-none d-md-flex col-md-4 border border-bottom-0">
            <h6 class="font-weight-600 my-auto py-3">Conversations</h6>
            <p class="font-weight-600 my-auto ml-2">{{$applyings->count()}}</p>
        </div>
        <div class="col-md-8 d-none d-md-flex border border-bottom-0 border-left-0 py-3">
            <h6 class="font-weight-600">Messages</h6>
            <h6 class="ml-auto my-auto text-muted font-weight-600">
                <i>"{{Auth::user()->projects->find($id)->project_name}}"</i></h6>
        </div>
    </div>
</div>

<div class="container a mb-3">
    <div class="row wrapper-container px-3 px-md-0">

        {{-- on mobile screeen collapsible content --}}
        <div class="col-12 px-0 d-block d-md-none wrapper-top">
            <div class="d-flex justify-content-between border rounded pointer px-3  bg-white" data-toggle="collapse" data-target="#collapse-content">
                <h6 class="font-weight-600 my-auto py-3">{{Auth::user()->projects->find($id)->project_name}}</h6>
            <p class="font-weight-600 my-auto ml-2">{{$applyings->count()}}</p>
            </div>
            <div id="collapse-content" class="collapse">
                <div class="list-group border border-top-0 rounded-0">
                    @foreach ($applyings as $apply)
                    <a href="#id{{$apply->id}}" onclick="$('.collapse').collapse('hide')"
                        class="list-group-item border-left-0 border-right-0 list-group-item-action d-flex align-content-center rounded-0"
                        data-toggle="tab">
                        <img src="/storage/cover_images/{{$apply->user->avatar}}" alt="" class="rounded-circle shadow-sm"
                            style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                        <span class="ml-2 my-auto">
    
                            <h6 class="p-0 m-0 font-weight-600">
                                {{$name = strlen($apply->user->name) > 24 ? substr($apply->user->name, 0, 24). "..." : $apply->user->name}}
                            </h6>
                            <p class="p-0 m-0">{{$apply->user->profileExtention->occupation ?? '' }}</p>
                        </span>
                        <small class="light ml-auto my-auto">{{$apply->created_at->diffForHumans()}}</small>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="d-none d-md-block col-md-4 p-0 m-0">
            <div class="list-group conversations border border-top-0 rounded-0">
                @foreach ($applyings as $apply)
                <a href="#id{{$apply->id}}"
                    class="list-group-item border-left-0 border-right-0 list-group-item-action d-flex align-content-center rounded-0"
                    data-toggle="tab">
                    <img src="/storage/cover_images/{{$apply->user->avatar}}" alt="" class="rounded-circle shadow-sm"
                        style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                    <span class="ml-2 my-auto">

                        <h6 class="p-0 m-0 font-weight-600">
                            {{$name = strlen($apply->user->name) > 24 ? substr($apply->user->name, 0, 24). "..." : $apply->user->name}}
                        </h6>
                        <p class="p-0 m-0">{{$apply->user->profileExtention->occupation ?? '' }}</p>
                    </span>
                    <small class="light ml-auto my-auto">{{$apply->created_at->diffForHumans()}}</small>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-8 pl-0 pl-md-2 wrapper-bottom tab-content border  bg-white">
            <div id="home" class="m-0 p-0 tab-pane active">
                <div class="m-4">
                    <h2 class="text-center text-muted font-weight-600">Select Applicatnt</h2>
                </div>
            </div>

            @foreach ($applyings as $apply)

            <div id="id{{$apply->id}}" class="tab-pane fade">
                <div class="scrollable col pl-0">
                @foreach ($apply->apply_body as $item)
                {{--  <p>{{$item->body}}</p> --}}
                <div class="d-flex align-items-between mt-4 ml-3">
                    <img src="/storage/cover_images/{{$item->user->avatar}}" alt="" class="rounded-circle shadow-sm"
                        style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                    <div>
                        <div class="d-flex align-items-center ml-3">
                            <h6 class="my-auto font-weight-600">{{$item->user->name}}</h6>
                            <span class="my-auto ml-2 font-size-13 text-muted font-weight-600">
                                {{$item->created_at->diffForHumans()}}</span>
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
        </div>
    </div>
</div>



@endsection

@extends('layouts.master')
@section('content')
  
  <div class="col-12 col-md-9 m-auto">
    <div class="container border shadow-sm bg-white px-4 mt-3">
    
      <div class="d-md-flex mt-4 w-100">
        <div>
          <img src="/storage/cover_images/{{$user->avatar}}" alt="" class="rounded-circle shadow-sm" 
          style="width:100px; height:100px; object-fit:cover; border: 4px solid white">
        </div>
        <div class="row ml-3">
          <div>
              <h4 class="font-weight-600">{{$user->name}}</h4>
              <h5 class="text-muted">{{$user->ProfileExtention->occupation ?? '' }}</h5>
          </div>
        </div>
        <div class="d-flex ml-3 ml-md-auto">
          <h5>Profile: </h5>&nbsp;
        <h5>{{$user->ProfileExtention->profile ?? '' }}</h5>
        </div>
      </div>
      <hr>
      <div class="d-flex mt-4">
        <div class="">
          <h5 class="font-weight-600">Location:</h5>
          <h5 class="d-flex"><i class="material-icons small-i ">location_on</i> {{$user->ProfileExtention->city ?? ''}}, {{$user->ProfileExtention->country ?? ''}}</h5>
        </div>
      </div>

      <div class="d-md-flex my-4">
        <div>
          <h5 class="font-weight-600">Contact:</h5>
          <div class="d-flex">
            <h5>Email:</h5>&nbsp;
            <h5><a href="mailto:{{$user->email}}">{{$user->email}}</a></h5>
          </div>
          <div class="d-flex">
            <h5>Website:</h5>&nbsp;
            <h5><a href="{{$user->ProfileExtention->website ?? '' }}">{{$user->ProfileExtention->website ?? ''}}</a></h5>
          </div>
        </div>
        <div class="d-flex align-items-end ml-auto">
          <h5>Member since:</h5>&nbsp;
          <h5 class="">{{$user->created_at->toFormattedDateString()}}</h5>
        </div>
      </div>
    </div>
    <div class="conteiner border shadow-sm bg-white mt-3">
      <div class="my-3 px-4">
        <h5 class="font-weight-600 py-2">Summary:</h5>
        <p class="py-2">{{$user->ProfileExtention->summary ?? ''}}</p>
      </div>
    </div>
  
    <div class="row p-0 mt-4 mx-0">
  
      <!-- sidebar -->
      <div class="col-12 col-md-3  p-0 m-0 border shadow-sm bg-white" style="height: 100%">
        <div class="">
          <ul class="list-group list-unstyled">
            <li class="list-group-item-action d-flex justify-content-between mt-1 py-2 px-4">
              <a href="">Posts</a>
              <span><p class="m-1">{{$user->projects()->count()}}</p></span>
            </li>
              <li class="mx-3 my-1 border-bottom"></li>
            <li class="list-group-item-action d-flex justify-content-between mb-1 py-2 px-4">
              <a href="">Save this user</a>
              <i class="material-icons small-i">bookmark_border</i>
            </li>
          </ul> 
        </div>
      </div>
      <!-- end sidebar -->

      <div class="col-12 col-md-9 px-0 pl-md-2 mt-4 mt-md-0">
        @foreach ($user->projects as $project)
          @include('layouts.post')
        @endforeach
    </div>
  </div>
</div>

@endsection

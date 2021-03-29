@extends('layouts.master')

  @section('content')
  <div class="row px-0 col-12 col-lg-10 mx-auto">

        <!-- sidebar -->
        @auth
          <div class="col-3 d-none d-md-block p-0 mt-3 border shadow-sm bg-white sticky-top" style="height: 100%">
            <div class="d-flex justify-content-center p-3">
              <a href="/index/{{ Auth::user()->id }}">
              <img src="/storage/cover_images/{{Auth::user()->avatar}}" alt="" class="rounded-circle shadow-sm" 
              style="width:60px; height:60px; object-fit:cover; border: 4px solid white">
            </a>
            </div>
            <div class="d-flex justify-content-center pt-0">
              <h6 class=" font-weight-600">
                <a href="/index/{{ Auth::user()->id }}">{{Auth::user()->name}}</a>
              </h6>
            </div>
            <ul class="list-group list-unstyled">
              <li class="mx-3 my-1 border-bottom"></li>
                <li class="list-group-item-action d-flex justify-content-between mt-1 py-2 px-4">
                    <a href="">My Posts</a>
                </li>
                <li class="list-group-item-action d-flex justify-content-between py-2 px-4">
                </li>
              </ul> 
        </div>
   @endauth
<!-- end sidebar -->
          <div class="col-12 col-md-9 mx-auto mt-3">
        
            @auth
            <div class="mb-3 mt-0">
                <div class="border shadow-sm d-flex align-items-center justify-content-center p-3">
                  <i class="material-icons pr-2 yellow">lightbulb_outline</i>
                  <a class="pt-2 text-center" href="/create">
                  <h5 class="font-weight-600 ">Create Project or startup idea, share vision for Product</h5>
                </a>
                </div>
            </div>
            @endauth
            @foreach ($projects as $project)
              
               @include('layouts.post')

            @endforeach
          </div>
          </div>
  
  @endsection

@extends('layouts.master')

@section('content')
   {{--  <div class="card-body">
        
        @foreach (Auth::user()->notifications as $notification)
            <p>{{$notification->data['user_name']}}</p> 
        @endforeach
    </div> --}}

    <div class="row mt-4" style="height: 500px">
        <div class="col-3 bg-white ">
            <div class=" nav list-group conversations border border-top-0 rounded-0" role="tablist">
                <div class="d-flex border-top border-bottom-0">
                    <h5 class="font-weight-600 ml-3 my-auto py-4">My Applyings</h5>
                </div>
               
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                    </li>
                  </ul>

            </div>
        </div>
        <div class="col-9 tab-content">
            <div class="d-flex">
                <div>
                    <div id="home" class="container tab-pane active"><br>
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                </div>    
            </div>
          </div>
    </div>






@endsection
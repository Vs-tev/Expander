
<div class="row m-0 bg-white logo-container">

    <nav class="navbar navbar-expand-md container">
        <a class="navbar-brand" href="#"><h2 class="">{{ config('app.name', 'expander') }}</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"><i class="material-icons">menu</i></span>
        </button>
        <div>
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <a href="/" class="nav-link yellow">{{ __('Home') }}</a> 
                </li> 
                <li class="nav-item">
                    <a href="/welcome" class="nav-link yellow">{{ __('Dashboard') }}</a> 
                </li> 
                @auth

                <li class="nav-item dropdown">
                    <a href="" id="apply" class="nav-link yellow"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="d-flex ">{{ __('Apply') }}&nbsp;
                            @if (Auth::user()->unreadNotifications->count())
                                <small class="rounded-circle bg-danger notification">
                                    <i class="material-icons extra-small-i">notifications_none</i>
                                </small> 
                            @endif
                        </span>
                    </a> 
                    <div class="dropdown-menu apply-dropdown-menu p-0 m-0" id="apply_menu" style="width:450px">
                        <form action="">
                            <ul class="nav navv border-bottom" role="tablist">
                                <li class="nav-item flex-fill border-right p-1" style="width: 50%">
                                    <a href="#recieved" class="nav-link tab_apply p-0 active" data-toggle="tab">
                                        <p class="d-flex justify-content-center font-weight-600 font-size-15 primary-color m-0 p-1">
                                            <span class="d-flex ">
                                                {{ __('Received Apply') }}&nbsp;<i class="material-icons small-i">mail_outline</i>
                                                @if (Auth::user()->recievedApplyNotification()->count())
                                                <small class="rounded-circle bg-danger notification">{{Auth::user()->recievedApplyNotification()->count()}}</small>  
                                                @endif
                                            </span>
                                        </p>
                                    </a>    
                                </li>
                                <li class="nav-item flex-fill p-1" style="width: 50%">
                                    <a href="#send" class="nav-link tab_apply p-0" data-toggle="tab">
                                        <p class="d-flex justify-content-center font-weight-600 font-size-15 primary-color m-0 p-1">
                                            <span class="d-flex ">
                                                {{ __('My Apply') }}&nbsp;<i class="material-icons small-i">mail_outline</i>
                                               @if (Auth::user()->myApplyNotification()->count())
                                               <small class="rounded-circle bg-danger notification">{{Auth::user()->myApplyNotification()->count()}}</small>
                                               @endif
                                            
                                            </span>
                                        </p>
                                    </a>    
                                </li>
                            </ul>
                        </form>
                        <div class="tab-content">
                            <div id="recieved" class="tab-pane active">
                           @if ($recievedApply->count())
                            @foreach ($recievedApply as $item)
                                <a href="/applications/{{$item->project->id}}"                              
                                    class="d-flex align-content-center list-group-item-action py-2 px-3 rounded-0">                     
                                    <img src="/storage/cover_images/{{$item->user->avatar}}" alt="" class="rounded-circle shadow-sm"
                                        style="width:45px; height:45px; object-fit:cover; border: 4px solid white">
                                    <span class="ml-2 my-auto">
                                        
                                        <h6 class="p-0 m-0 font-weight-600">
                                            {{$name = strlen($item->user->name) > 20 ? substr($item->user->name, 0, 20). "..." : $item->user->name}}
                                        <span class="font-size-13"> <span class="text-muted font-weight-500">has applied to</span> "{{$item->project->project_name}}"</span>
                                        </h6>

                                        @if (Auth::user()->markAsUnread($item->project->id))
                                            <p class="pt-1 m-0 primary-color font-weight-600">{{substr($item->apply_body->last()->body, 0, 59)}}</p>
                                        @else
                                            <p class="pt-1 m-0 primary-color">{{substr($item->apply_body->last()->body, 0, 59)}}</p>
                                        @endif
                                    
                                    </span>
                                    <small class="light ml-auto my-auto">{{$item->apply_body->last()->created_at->diffForHumans()}}</small>
                                </a>
                            @endforeach
                            @else
                              <p class="font-weight-600 text-center m-auto p-3 text-muted">No received apply</p> 
                            @endif
                        </div>
                        <div id="send" class="tab-pane fade">
                            @if ($myapplyings->count())
                                @foreach ($myapplyings as $apply)
                                    <a href="/myapplyings" class="d-flex list-group-item-action align-content-center py-2 px-3 ">
                                        <i class="material-icons" style="width:45px; height:45px">send</i>
                                            <span>
                                                <h6 class="p-0 m-0 font-weight-600">
                                                    {{substr($apply->project->project_name, 0, 20)}}
                                                </h6>
                                                
                                                @if (Auth::user()->markAsUnread($apply->project->id))
                                                    <p class="pt-1 m-0 primary-color font-weight-600">{{substr($apply->apply_body->sortBy('created_at')->last()->body, 0, 29). "..."}}</p> 
                                                @else
                                                    <p class="pt-1 m-0 primary-color">{{substr($apply->apply_body->sortBy('created_at')->last()->body, 0, 29). "..."}}</p>
                                                @endif
                                            
                                            </span>
                                        <small class="light ml-auto my-auto">{{$apply->apply_body->sortBy('created_at')->last()->created_at->diffForHumans()}}</small>
                                    </a>
                                @endforeach
                            @else
                                <p class="font-weight-600 text-center m-auto p-3 text-muted">No send applyings</p> 
                            @endif
                        </div>
                    </div>
                    <div class="bg-light p-2 border-top">
                        <a href="#" type="button" class="">Mark all as read</a>
                    </div>
                    </div>
                </li> 
                @endauth
            </ul>
        </div>
        <div class="collapse navbar-collapse ml-auto" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    
                    <li class="nav-item dropdown">
                        <div class="d-inline-flex">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-2 font-size-15 yellow font-weight-600" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>
                            
                            <img src="/storage/cover_images/{{Auth::user()->avatar}}" alt="" class="rounded-circle shadow-sm"
                            style="width:40px; height:40px; object-fit:cover; border: 4px solid white">
                       
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/create" class="dropdown-item">{{ __('Create Project') }}</a>    

                            <a href="/index/{{ Auth::user()->id }}" class="dropdown-item">{{ __('My Profile') }}</a> 
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                            </form>
                        </div>
                    </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
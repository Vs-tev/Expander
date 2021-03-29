@include('layouts.modal_avatar')
    @include('layouts.modal_profil')
    @include('layouts.errors')
        <div class="profile-container row rounded shadow-sm m-0 py-3 px-2 px-md-4 border border-top-0">
            <div class="d-flex justify-content-between pb-2 mb-auto border-bottom w-100">
                <a href="#profile_modal" class="btn btn-link d-flex p-0" data-toggle="modal">
                    <i class="material-icons small-i mr-1">edit</i><span> Edit Profile</span></a>
                <p class="p-0 m-0"><span class="text-muted">Profile: </span> {{Auth::user()->ProfileExtention->profile ?? ''}}</p>
            </div>
            <div class="d-md-flex text-center text-md-left align-items-center mt-2 mt-md-4 w-100">
                <div class="align-self-end mt-3">
                    <i data-toggle="modal" data-target="#myModal" class="material-icons"
                    style="cursor: pointer">add_a_photo</i>
                </div>
                <div class="align-self-end">
                    <img src="/storage/cover_images/{{Auth::user()->avatar}}" alt="" class="rounded-circle shadow-sm" 
                    style="width:160px; height:160px; object-fit:cover; border: 4px solid white">
                </div>
               
                <div class="flex-grow-1 ml-0 ml-md-3 mt-2">
                    <div class="">
                        <h4 class="m-0 font-weight-600">{{Auth::user()->name}}</h4>
                        <h5 class="my-2">{{Auth::user()->ProfileExtention->occupation ?? ''}}</h5>
                    </div>
                    <div class="d-flex mr-auto text-muted">
                        <span class="d-flex">
                            <i class="material-icons small-i">location_on</i>
                            <p class="m-auto">{{Auth::user()->ProfileExtention->city ?? 'city'}}, {{Auth::user()->ProfileExtention->country ?? 'country'}}</p>
                        </span>
                    </div>
                    <div class="bg-light my-3 px-3 py-2 ">
                        <h6 class="font-weight-600">Summary:</h6>
                        <p>{!! Auth::user()->ProfileExtention->summary ??  '<a href="" data-toggle="modal" data-target="#profile_modal">+Create Summary</a>' !!}</p>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-12 my-auto">
                <div class="row justify-content-end align-items-center">
                <i class="material-icons mr-1 my-0 text-muted small-i">person</i>
                <p class="text-muted font-weight-bold my-0">Member since &nbsp;</p>
                <p class="text-muted my-0"> {{ Auth::user()->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>

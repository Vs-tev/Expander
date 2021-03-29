
<div class="project-container border rounded mb-4 shadow-sm">
  <div class="d-md-flex px-3 pt-3 align-content-center justify-content-between bg-white">
    <div class="d-flex">
      <div>
        <img src="/storage/cover_images/{{$project->user->avatar}}" alt="" class="rounded-circle shadow-sm" 
        style="width:80px; height:80px; object-fit:cover; border: 4px solid white"> 
      </div>
      <div class="d-flex mt-0">
        <div class="ml-2">
          <h6 class="font-weight-bold p-0 my-auto mb-0">
            <a href="/profile/{{$project->user->id}}">{{$project->user->name}}</a></h6>
          <a href="/project_deteils/{{$project->id}}" class="d-flex mt-2 primary-color">
            <i class="material-icons" style="font-size: 20px">lightbulb_outline</i>
            <h5 class="">{{$project->project_name}}, &nbsp;</h5>
          </a>
          <h6 class="text-muted">{{$project->started_at->toFormattedDateString()}}</h6>
        </div>
      </div>
    </div>  
    <div class="mt-3">
        <h6><span class="badge badge-primary p-2 rounded-0 font-weight-500">{{$project->progress}}</span></h6>
        <p class=""></p>
    </div> 
  </div>

  <div class="px-3 py-2 bg-white" style="max-height: 110px;">
    <p style="overflow:hidden; max-height:90px;">{{$project->description}}</p>
  </div>

<div class="d-flex justify-content-center">
  <img class="m-auto" src="/storage/cover_images/{{$project->cover_image}}" alt="" style="width:100%; height:300px; object-fit:cover">
</div>
<div class="d-flex justify-content-between bg-light p-3">
  <div>
    <h6 class="font-weight-bold mt-3">{{$project->help}}</h6>
    <div class="d-flex justify-content-between ml-auto py-2">
        <a href="#"class="d-flex py-1 text-muted">
            <i class="material-icons">location_on</i>
            <p class="m-auto">{{$project->city}}, {{$project->country}}</p>
        </a>
    </div>
  </div>
  <div class="my-auto">
    <a href="/project_deteils/{{$project->id}}" class="btn btn-outline-primary m-auto" >View deteils</a>
  </div>
</div>
</div>

<div class="col-3 border p-0 m-0 shadow-sm bg-white" style="height: 100%">
   
    <div class="list-group list-group-flush list-unstyled">
        <a href="" class="list-group-item list-group-item-action d-flex justify-content-between">
            <p class="py-2 m-0">Received applications</p>
            <p class="yellow py-2 m-0">{{Auth::user()->recivedApplications()}}</p>
        </a>
        <a href="/myapplyings" class="list-group-item list-group-item-action d-flex justify-content-between ">
            <p class="py-2 m-0">My applyings</p>
            <p class="py-2 m-0 yellow">{{Auth::user()->applyings->count()}}</p>
        </a>
        <a href="" class="list-group-item list-group-item-action d-flex justify-content-between">
            <p class="py-2 m-0">Saved Post</p>
            <i class="material-icons small-i yellow py-2 m-0">bookmark_border</i>
        </a>
      </div> 
   
</div>
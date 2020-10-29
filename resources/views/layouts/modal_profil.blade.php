<form method="POST" action="/index/{{Auth::user()->id}}/profile">
    {{ csrf_field() }}
@method('PATCH')
    
<div class="modal" id="profile_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body mx-4">
            
        <div class="row justify-content-between  mt-3">
            <div class="form-group col-6">
                <label for="name">Name</label>
            <input value="{{Auth::user()->name}}" type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-6">
                <label for="email">Email</label>
                <input value="{{Auth::user()->email}}" type="text" name="email" class="form-control">
            </div>
           
        </div>
        <div class="form-group row mt-3">
            <div class="col-12 m-auto">
                <label class="" for="summary">Summary <small class="text-muted">Max: 5000</small></label>
                <textarea name="summary" id="" class="form-control" rows="1" placeholder="Type a few introductory words">{{Auth::user()->ProfileExtention->summary ?? ''}}</textarea>
            </div>
            
        </div>
        <div class="form-group row mt-4">
            <div class="col-6 m-auto">
                <label for="occupation">Occupation, Branche</label>
                <input value="{{Auth::user()->ProfileExtention->occupation ?? ''}}" type="text" 
                name="occupation" class="form-control" placeholder="Text">
            </div>
            <div class="col-6 m-auto">
                <label for="status">Profile</label>
                <select type="text" name="profile" class="form-control">
                    @foreach ($profiles as $profile)
                     <option value="{{$profile}}" {{$profile == !empty(Auth::user()->ProfileExtention->profile) ? 'selected' : ''}}>{{$profile}}</option>
                    @endforeach
                   
                </select>
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-6">
                <label for="website">Website <small class="text-muted">Optional</small></label>
                <input value="{{Auth::user()->ProfileExtention->website ?? ''}}" type="text" 
                name="url" class="form-control" placeholder="My website">
            </div>
        </div>
         <div class="mt-5 mb-3">
             <h6 class="text-center font-weight-600">Your Location</h6>
         </div>
        <div class="form-group row">
            <div class="col-6 m-auto">
                <label for="country">Country</label>
                <select type="text" name="country" class="form-control">
                    <option value="Usa">Usa</option>
                    <option value="Germany">Germany</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="France">France</option>
                </select>
            </div>
            <div class="col-6 m-auto">
                <label for="city">City</label>
                <select type="text" name="city" class="form-control">
                    <option value="Los Angelos">Los Angelos</option>
                    <option value="Berlin">Berlin</option>
                    <option value="Sofia">Sofia</option>
                    <option value="Paris">Paris</option>
                </select>
            </div>
        </div>
    </div>
        <!-- Modal footer -->
        <div class="modal-footer mx-4">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        
      </div>
    </div>
  </div>     
</form>
@extends('layouts.master')

@section('content')
    @include('layouts.errors')
    <div class="col-md-8 m-auto">
        <div class="contaner my-5">
          <h2 class="text-center text-muted font-weight-bold">Edit Project</h2>
        </div>
          <form method="POST" action="/project/{{$project->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="project_name">Project Name <small class="text-muted">( Company Name or Idea)</small></label>
                <input value="{{$project->project_name}}" type="text" name="project_name" class="form-control" id="project_name" placeholder="I build an app that helps people eat healthier " required>
                </div>
              </div>

              <div class="mb-3">
                <label for="branch">Branch / Industrie</label>
                 <select name="branch" class="custom-select" id="branch">
                   <option value="">Choose ...</option>
                   @foreach ($branches as $branch)
                   <option value="{{$branch}}" {{ $branch == $project->branch ? 'selected' : ''}}>{{$branch}}</option>
                     @endforeach
                 </select>
              </div>
  
              <div class="mb-3">
                <label for="description">Description / Pourpes </label>
                 <textarea name="description" class="form-control" id="description" cols="30" rows="5" 
                 placeholder="Try to give an accurate description of the project, the company or the idea you have. Тhe more accurately and comprehensively described the greater the chance you will find the right contacts and sought partners. 
  For example, if you are looking for help or a partner for a web project, describe the web technologies used, or those that will be used.">{{$project->description}}</textarea>
                 
              </div>
  
              <div class="mb-3 mt-5">
              <div class="d-flex">
                <label for="">Stage of development</label>
                  <div class="d-flex ml-auto">
                    <p class="text-muted m-0">Current: </p><span class="font-weight-bold m-0">&nbsp; {{$project->progress}}</span>
                  </div>
                 
                </div> 
                  <select name="progress" class="custom-select d-block w-100" id="progress" required>
                    <option value="">Choose...</option>
                    @foreach ($progress as $item)
                  <option value="{{$item}}" {{ $item == $project->progress ? 'selected' : ''}}>{{$item}}</option>
                    @endforeach
                  </select>
              </div>
  
              <div class="mb-5 mt-5">
                <div class="d-flex ">
                    <label for="">What help i need</label>
                      <div class="d-flex ml-auto">
                        <p class="text-muted m-0">Current: </p><span class="font-weight-bold  m-0">&nbsp; {{$project->help}}</span>
                      </div>
                     
                    </div> 
                  <select name="help" class="custom-select d-block w-100" id="help" required>
                    <option value="">Choose...</option>
                    @foreach ($help as $item)
                    <option value="{{$item}}" {{$item == $project->help ? 'selected' : ''}}>{{$item}}</option>
                      @endforeach
                  </select>
              </div>
              <hr>
              <div class="mb-4 ">
                  <div class="mb-3">
                      <h5 class="text-center text-muted m-3">Edit Location</h5>
                      <div class="d-flex justify-content-center">
                        <i class="material-icons">location_on</i>
                      <p>{{$project->city}}, {{$project->country}}</p>
                      </div>
                  </div>
                  <div class="row ">
                      <div class="col-md-6 ">
                          <label for="coutrny">Country</label>
                          <select class="custom-select d-block w-100" id="country" name="country" required>
                              <option value="">Choose...</option>
                              <option value="United States">United States</option>
                            </select>
                      </div>
                      <div class="col-md-6">
                          <label for="city">City</label>
                          <select name="city" class="custom-select d-block w-100" id="city" required>
                              <option value="">Choose...</option>
                              <option value="California">California</option>
                            </select>
                      </div>
                  </div>
               
              </div>
  
              
              <div class="form-group row justify-content-between mb-3">
                <div class="col-md-4">
                  <label for="cover_image">Logo</label>
                <input value="{{$project->cover_image}}" type="file" name="cover_image" class="form-control-file">
                </div>
                 <div class="col-md-6">
                  <label for="website">Website <small class="text-muted">(Optional)</small></label>
                 <input value="{{$project->website}}" type="url" name="website" class="form-control" placeholder="https://www.example.com">
                 </div>
  
              </div>
  
              <div class="form-group my-5">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Save Changes</button>
              </div>
            </form>
          </div>



@endsection
@extends('layouts.master')

@section('content')
@include('layouts.errors')
    <div class="col-md-8 m-auto">
     
      <div class="contaner my-5">
        <h2 class="text-center text-muted font-weight-bold">Create Project, Company or product Idea</h2>
      </div>
        <form method="POST" action="/create" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="project_name">Project Name <small class="text-muted">(Product idea)</small></label>
                <input type="text" name="project_name" class="form-control" id="project_name" placeholder="I build an app that helps people eat healthier " required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="started_at">Started at:</label>
                <input type="date" name="started_at" class="form-control" id="started_at" placeholder="" value="" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="branch">Branch / Industrie</label>
               <select name="branch" class="custom-select" id="branch">
                 <option value="">Choose ...</option>
                 @foreach ($branches as $branch)
                 <option value="{{$branch}}">{{$branch}}</option>
                   @endforeach
               </select>
            </div>

            <div class="mb-3">
              <label for="description">Description / Pourpes </label>
               <textarea name="description" class="form-control" id="description" cols="30" rows="5" 
               placeholder="Try to give an accurate description of the project, the company or the idea you have. Тhe more accurately and comprehensively described the greater the chance you will find the right contacts and sought partners. 
For example, if you are looking for help or a partner for a web project, describe the web technologies used, or those that will be used."></textarea>
               
            </div>

            <div class="mb-3">
                <label for="progress">Stage of development</label>
                <select name="progress" class="custom-select d-block w-100" id="progress" required>
                  <option value="">Choose...</option>
                  @foreach ($progress as $item)
                <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                  <!-- <option value="">Choose...</option>
                  <option value="I have an idea">I have an idea</option>
                  <option value="I have an idea and a plan">I have an idea and a plan</option>
                  <option value="I have a working project">I have a working project</option>
                  <option value="Working project with income">Working project with income</option>
                  <option value="Working project with profit">Working project with profit</option>
                 -->
                </select>
            </div>

            <div class="mb-3">
                <label for="help">What help i need</label>
                <select name="help" class="custom-select d-block w-100" id="help" required>
                  <option value="">Choose...</option>
                  @foreach ($help as $item)
                <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                 {{--  <option value="I'm looking for a partner">I'm looking for a partner</option>
                  <option value="I'm looking for a advisor">I'm looking for a advisor</option>
                  <option value="I'm looking for a collaborator">I'm looking for a collaborator</option>
                  <option value="I'm looking for a team">I'm looking for a team</option>
                  <option value="I'm looking for a specialist">I'm looking for a specialist</option>
                  <option value="I'm looking for a investor">I'm looking for a investor</option>
                  <option value="I'm looking for a worker">I'm looking for a worker</option> --}}
                </select>
            </div>
            <hr>
            <div class="mb-4 ">
                <div class="m-auto">
                    <h5 class="text-center text-muted m-3">Select the Location of the company or yours </h5>

                </div>
                <div class="row ">
                    <div class="col-md-6 ">
                        <label for="coutrny">Country</label>
                        <select class="custom-select d-block w-100" id="country" name="country" required>
                            <option value="">Choose...</option>
                            <option value="United States">United States</option>
                            <option value="United States">America</option>
                          </select>
                    </div>
                    <div class="col-md-6">
                        <label for="city">City</label>
                        <select name="city" class="custom-select d-block w-100" id="city" required>
                            <option value="">Choose...</option>
                            <option value="California">California</option>
                            <option value="San Francisco">San Francisco</option>
                          </select>
                    </div>
                </div>
             
            </div>

            
            <div class="form-group row justify-content-between mb-3">
              <div class="col-md-4">
                <label for="cover_image">Logo</label>
                <input type="file" name="cover_image" class="form-control-file">
              </div>
               <div class="col-md-6">
                <label for="website">Website <small class="text-muted">(Optional)</small></label>
                 <input value="" type="url" name="website" class="form-control" placeholder="https://www.example.com">
               </div>

            </div>

            <div class="form-group my-5">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </div>
          </form>
         
        </div>
@endsection
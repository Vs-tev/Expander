@extends('layouts.master')

@section('content')
   
       <div class="container m-auto">
           <div class="d-flex justify-content-around " style="height: 80vh">
                <div class="col-md-6 m-auto">
                    <a class="btn btn-light p-3" href="/">
                        <h1 class="font-weight-600">Find Oportunity</h1></a>
                </div>
           <div class="col-md-6 m-auto">
               <a class="btn btn-light p-3" href="/create">
                <h1 class="font-weight-600">Create Porject, Company, Ideas</h1></a>
            </div>
       </div>
    </div>
 
@endsection --}}
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Car
        </div>
        <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
            All fields are required!
        </div>
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" class="form-control" id="make" required placeholder="Make" name="make" v-model="newCar.make">
        </div>
                            
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" required placeholder="Model" name="model" v-model="newCar.model">
        </div>

        <button class="btn btn-primary" @click.prevent="createCar()">
            Add Car
        </button>

    <table class="table table-striped" id="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for ="car in cars">
            <th scope="row">@{{car.id}}</th>
            <td>@{{car.make}}</td>
            <td>@{{car.model}}</td>

            <td @click="setVal(car.id, car.make, car.model)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
            </td>
            <td  @click.prevent="deleteCar(car)" class="btn btn-danger"> 
            <i class="fa fa-trash"></i>
            </td>
            </tr>
        </tbody>
    </table>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit car</h4>
            </div>
            <div class="modal-body">
                
            <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                        required  :value="this.e_id">
                                Make: <input type="text" class="form-control" id="e_make" name="make"
                                        required  :value="this.e_make">
                                Model: <input type="text" class="form-control" id="e_model" name="model"
                                required  :value="this.e_model">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="editCar()">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>
    </div>
</div>
<div  id="ap">
    
    <front-page>
       
        
    </front-page>
</div>
@section('content')
{{-- <div  id="app" >
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Car
            </div>
            <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                All fields are required!
            </div>

            <form @submit="checkForm"  id="app">
                <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                    <li v-for="error in errors">@{{ error }}</li>
                    </ul>
                  </p>
            <div class="form-group">
                <label for="make">Make</label>
                <input type="text" class="form-control" id="make" placeholder="Make" name="make" v-model="newCar.make">
            </div>
                                                    
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" id="model" placeholder="Model" name="model" v-model="newCar.model">
            </div>
            
            <button class="btn btn-primary" type="submit">
                Add Car
            </button>
        </form>
        <table class="table table-striped" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for ="car in cars">
                <th>@{{car.id}}</th>
                <td>@{{car.make}}</td>
                <td>@{{car.model}}</td>

                <td>
                <button v-on:click="setVal(car.id, car.make, car.model)" class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">edit</button>
                </td>
                <td  @click.prevent="deleteCar(car)" class="btn btn-danger"> 
                <i class="fa fa-trash"></i>
                </td>
                </tr>
            </tbody>
        </table>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit car</h4>
                </div>
                <div class="modal-body">
                    
                <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                            required  :value="this.e_id">
                                    Make: <input type="text" class="form-control" id="e_make" name="make"
                                            required  :value="this.e_make">
                                    Model: <input type="text" class="form-control" id="e_model" name="model"
                                    required  :value="this.e_model">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="editCar()">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</div> --}}

<div id="app">


<form
 
  @submit="checkForm"
  action=""
  method="post"
>

  <p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors">@{{ error }}</li>
    </ul>
  </p>

  <p>
    <label for="name">Name</label>
    <input
      id="name"
      v-model="form.name"
      type="text"
      name="name"
    >
  </p>

  <p>
    <label for="age">Age</label>
    <input
      id="age"
      v-model="form.age"
      type="number"
      name="age"
      min="0"
    >
  </p>

  <p>
    <label for="movie">Favorite Movie</label>
    <select
      id="movie"
      v-model="form.movie"
      name="movie"
    >
      <option>Star Wars</option>
      <option>Vanilla Sky</option>
      <option>Atomic Blonde</option>
    </select>
  </p>


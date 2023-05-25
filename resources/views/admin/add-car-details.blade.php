@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div >
            @if(Session::has('status'))
                <h6 class="alert alert-sucess">{{Session('status')}}</h6>
            @endif
        </div>

        <center><h1><b>Add Cars</b></h1><br><br>
   <form action="{{route('save-car-details')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
      </div><br>
      <div class="form-row">
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="owner" id="owner" placeholder="Owner" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="color" id="color" placeholder="Colour" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="rent" id="rent" placeholder="Enter Rent Per KM" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="car_number" id="car_number" placeholder="Car Number" >
      </div><br>
      <div class="form-group col-md-4">    
        <span>Car Image</span>
        <input type="file" class="form-control" name="image" id="image" placeholder="Upload Car Image">     
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Driver name" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="email" id="email" placeholder="Driver Email" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Driver Phone" >
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="age" id="age" placeholder="Driver Age" >
      </div><br>
      <div class="form-group col-md-4">
      
 
      <button type="submit" name="add" id="add" class="btn btn-outline-primary">Add</button>
    </div>
  
  </div>
  
</form>
</center>
    </div>
</div>
@endsection

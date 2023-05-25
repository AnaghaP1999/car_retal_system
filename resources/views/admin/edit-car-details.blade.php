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
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <div class="form-row">
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $carDetails->name}}">
      </div><br>
      <div class="form-row">
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="owner" id="owner" placeholder="Owner" value="{{ $carDetails->owner}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="color" id="color" placeholder="Colour" value="{{ $carDetails->color}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="rent" id="rent" placeholder="Enter Rent Per KM" value="{{ $carDetails->rent}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="car_number" id="car_number" placeholder="Car Number" value="{{ $carDetails->car_number}}">
      </div><br>
      <div class="form-group col-md-4">    
        <span>Car Image</span>
        <img height="100px" width="100px" src="{{asset($carDetails->image)}}">
        <input type="hidden" id="image" name="image" value="{{$carDetails->image}}">
        <input type="file" class="form-control" name="image" id="image" placeholder="Upload Car Image">     
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Driver name" value="{{ $carDetails->driver_name}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="email" id="email" placeholder="Driver Email" value="{{ $carDetails->email}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Driver Phone" value="{{ $carDetails->phone}}">
      </div><br>
      <div class="form-group col-md-4">
        <input type="text" class="form-control" name="age" id="age" placeholder="Driver Age" value="{{ $carDetails->age}}">
      </div><br>
      <div class="form-group col-md-4">
      
 
      <button type="submit" name="add" id="add" class="btn btn-outline-primary">Update</button>
    </div>
  
  </div>
  
</form>
</center>
    </div>
</div>
@endsection

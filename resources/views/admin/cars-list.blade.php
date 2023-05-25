@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div >
    @if(Session::has('status'))
                  <h6 class="alert alert-sucess">{{Session('status')}}</h6>
                @endif
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<a href="{{ url('/add-car-details') }}" type="button" class="btn btn-outline-primary btn-sm">Add Cars</a>
</div>
    <center><h1><b>Cars</b></h1> 
    <div class="card-body">
    <div class="table-responsive">
        <table class="table tablesorter">
        <thead >
                  <tr>
                    <th class="text-center">  ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Owner</th>
                    <th class="text-center">Colour</th>
                    <th class="text-center">Rent</th>
                    <th class="text-center">Car Number</th>
                    <th class="text-center">Image</th>
                    <!-- <th class="text-center">Availability</th> -->
                    <th class="text-center">Actions</th>
</tr> 
        </thead>
           <tbody class=" text-secondary">
           @php
              $i = 1;
            @endphp
            @foreach($carDetails as $details)
           
            <tr>
            <th class="text-center">
              {{ $i++ }}
            </th>
            <th class="text-center">
              {{ $details->name }}
            </th>
            <th class="text-center">
            {{ $details->owner }}
            </th>
            <th class="text-center">
            {{ $details->color }}
            </th>
            <th class="text-center">
            {{ $details->rent }}
            </th>
            
            <th class="text-center">
            {{ $details->car_number }}
            </th>
            <th class="text-center">
            <img height="100px" width="100px" src="{{asset($details->image)}}">
            </th>

            <th class="text-center">
                 <a href="{{"edit-car-details/" .$details['id']}}" class="btn btn-primary">Check Detail</a><br>
                 <a href="{{"delete-car-details/" .$details['id']}}" >Delete</a>

            </th>
          @endforeach
          </tr>
   
     </tbody>
   </table>  
  </div>      
</div>

  </center>

    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div >
    @if(Session::has('status'))
                  <h6 class="alert alert-sucess">{{Session('status')}}</h6>
                @endif
</div>
    <center><h1><b>User List</b></h1>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table tablesorter">
        <thead >
                  <tr>
                    <th class="text-center">  ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Actions</th>
                    <!-- <th class="text-center">Rate</th>
                    <th class="text-center">Car Number</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Availability</th>
                    <th class="text-center">Actions</th> -->
</tr>
        </thead>
           <tbody class=" text-secondary">
           @php
              $i = 1;
            @endphp
            @foreach($userDetails as $details)
           
            <tr>
            <th class="text-center">
             {{ $i++}}
            </th>
            <th class="text-center">
              {{$details->name}}
            </th>
            <th class="text-center">
              {{ $details->email }}
            </th>
            <th class="text-center">
              {{ $details->phone}}
            </th>
            <th class="text-center">
              {{ $details->address}}
            </th>
            <th class="text-center">
            <a href="#" class="btn btn-primary"> Rental Details</a><br>

            </th>
          </tr>
   @endforeach
     </tbody>
   </table>  
  </div>      
</div>

  </center>

    </div>
</div>
@endsection

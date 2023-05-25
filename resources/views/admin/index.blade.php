@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Cars</h5>
                <p class="card-text"><b>{{ $totalCount }}</b></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text"><b>{{ $totalUsers }}</b></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br>
    <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Rented Cars</h5>
        <p class="card-text"><b>2</b></p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Available Cars</h5>
        <p class="card-text"><b>1</b></p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
</div>
</div>
@endsection

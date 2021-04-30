@extends('layout.main')

@section('content')


<div class="container">

@if($errors->any())

@foreach($errors->all() as $error)

<div class="alert alert-danger" role="alert" >
	{{$error}}
</div>

@endforeach


@endif

<h1> Create Page </h1> <br><br>


<form class="text-center border border-light p-5" action="{{route('store')}}" method="POST">

	{{csrf_field()}}
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" name="firstname" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" name="lastname" />
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form3Example3" class="form-control" name="email" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>

  <!-- Telephone input -->
  <div class="form-outline mb-4">
    <input type="phone" id="form3Example4" class="form-control" name="telephone" />
    <label class="form-label" for="form3Example4">Telephone</label>
  </div>

  
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Add Data</button>

  <!-- Register buttons -->
  <div class="text-center">
    
  </div>
</form>
</div>
<br><br><br><br><br><br>
@endsection

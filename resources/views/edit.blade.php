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

<h1> Edit Page </h1> <br><br>


<form class="text-center border border-light p-5" action="{{route('update',$student->id)}}" method="POST">

	{{csrf_field()}}
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" value="{{$student->first_name}}" name="firstname" placeholder="First name" />
        
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" value="{{$student->last_name}}" name="lastname" placeholder="Last name" />
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form3Example3" class="form-control" value="{{$student->email}}" name="email" placeholder="Email" />
  </div>

  <!-- Telephone input -->
  <div class="form-outline mb-4">
    <input type="phone" id="form3Example4" class="form-control" value="{{$student->phone}}" name="telephone" placeholder="Telephone" />
  </div>

  
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Update Data</button>

  <!-- Register buttons -->
  <div class="text-center">
    
  </div>
</form>
</div>
<br><br><br><br><br><br>
@endsection

@extends('layout.main')

@section('content')


<h1> Home Page </h1> 

 
@if(session('successMsg'))
<div class="alert alert-success" role="alert">
	{{session('successMsg')}}
</div> 

@endif


<div class="container">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($student2 as $student3)
    <tr>
      <th scope="row">{{$student3->id}}</th>
      <td>{{$student3->first_name}}</td>
      <td>{{$student3->last_name}}</td>
      <td>{{$student3->email}}</td>
      <td>{{$student3->phone}}</td>
      <td><a href="{{route('edit',$student3->id)}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>


      |

      <form method="POST" id="delete-form{{$student3->id }}" action="{{route('delete',$student3->id)}}" style="display:none;">

      {{csrf_field()}}
      {{method_field('delete')}}




      </form>

      <button onclick="if(confirm('Are you sure you want to proceed?')){

      event.preventDefault();
      document.getElementById('delete-form{{$student3->id }}').submit();
  }else{
  		event.preventDefault();




      }">

      		<a href=" "> <i class="fa fa-trash" aria-hidden="true"></i> 

      </button>

  		  </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

</div>






@endsection

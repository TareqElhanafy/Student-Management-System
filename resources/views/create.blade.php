@extends('layouts.main')
@section('content')
<br>
<br>
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-default">
<div class="card-header">
    <strong>
        {{isset($student)? 'Edit Student Data' : 'Create New student Data'}}
    </strong>
    </div>

<div class="card-body">
<form action="{{isset($student)? route('students.update',$student->id):route('students.store')}}" method="post">
    @csrf
    @if(isset($student))
    @method('PUT')
    @endif
    
  @if($errors->any())
  <div class="alert alert-danger">
      <ul class="list-group">

      @foreach($errors->all() as $error)
      <li class="list-group-item">
{{$error}}
      </li>
      @endforeach
      </ul>

  </div>
  @endif
  
    <div class="form-group">
<input type="text" class="form-control" name="firstname" placeholder="Enter first name" value="{{isset($student)?$student->firstname : ''}}">
    </div>
    <div class="form-group">
<input type="text" class="form-control" name="lastname" placeholder="Enter last name" value="{{isset($student)?$student->lastname : ''}}"> 
    </div>
    <div class="form-group">
<input type="number" class="form-control" name="age" placeholder="Enter student age" value="{{isset($student)?$student->age : ''}}">
    </div>
    <div class="form-group">
<input type="text" class="form-control" name="speciality" placeholder="Enter student speciality" value="{{isset($student)?$student->speciality : ''}}">
    </div>
    <div class="form-group">
<button type="submit" class="btn btn-success">{{isset($student)?'Update' :'Add'}}</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
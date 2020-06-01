@extends('layouts.main')
@section('content')
    <div class="container">
        <br>
        <br>
        <h1 class="text-center my-5">
            Student Managment System
        </h1>
            <div class="row justify-content-center">
<div class="col-md-10">
<div class="card card-default">
<div class="card-header">
<strong>
Students Data

</strong>
</div>

<div class="card-body">
    <table class="table table-bordered">
<thead class="thead-dark">
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name </th>
        <th>Age</th>
        <th>Speciality</th>
    </tr>

</thead>
<tbody>
    @foreach($students as $student)
    <tr>
    <td>
        {{$student->id}}

        </td>
        <td>
            {{$student->firstname}}

        </td>
        <td>
        {{$student->lastname}}

        </td>
        <td>
        {{$student->age}}

        </td>
        <td>
        {{$student->speciality}}

        </td>
        <td>
            <form action="{{route('students.destroy',$student->id)}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
<td>
<a href="{{route('students.edit',$student->id)}}" class="btn btn-warning">Edit</a>
</td>
    </tr>
    @endforeach
</tbody>
    </table>
</div>
<div class="card-footer">
{{$students->links()}}
</div>
</div>
</div>
            </div>
        </div>
@endsection
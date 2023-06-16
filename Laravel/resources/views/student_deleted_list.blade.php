@extends('layouts.main')

@section('title', 'student_deleted_list')

@section('content')
<h1>
    <center>Halaman student_deleted_list</center>
</h1>

<div class="container my-5 ">
    <a href="/students" class="btn btn-primary">Back</a>

</div>
<div class="container mt-5">

        <table class="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Class ID</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $deleted_student as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->classRoom ['name'] }} </td>
                    <td>{{ $data->gender }} </td>
                    <td>{{ $data->nis }} </td>
                    <td> 
                        
                        <a href="/student_deleted/{{$data->id}}/restore">Restore</a>
                     </td>
                </tr>
                @endforeach
            </tbody>
          
        </table>
      
</div>
@endsection
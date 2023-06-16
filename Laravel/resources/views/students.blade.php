
@extends('layouts.main')

@section('title', 'students')
    
@section('content')
    <h1><center>Halaman students</center></h1>

    @if (Session::has('status'))
    <div class="container">
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>    
    </div>
        
    @endif

  
    <div class="container">
        @if (Auth::user()->role_id == 2)
                        
        @else
        <div class="my-5 d-flex justify-content-between">
            <a href="student_add" class="btn btn-primary">ADD data</a>
            <a href="student_deleted" class="btn btn-info">Show Deleted Data</a>
        </div>
        @endif
       

        <div class="  my-3 col-6">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <button class="input-group-text btn btn-primary">Search</button>
                  
                        {{--  <div class="form-floating">  --}}
                        <input type="text" class="form-control" name="keyword"  placeholder="keywords">
                        {{--  <label for="floatingInputGroup1">Username</label>  --}}
                        {{--  </div>  --}}
                  </div>
            </form>
        </div>

       <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Class ID</th>
                    {{--  <th>Gender</th>  --}}
                    {{--  <th>NIS</th>  --}}
                    <th>
                    @if (Auth::user()->role_id == 2)
                        
                    @else
                        Action
                    @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->classRoom ['name'] }} </td>
                    {{--  <td>{{ $data->gender }} </td>  --}}
                    {{--  <td>{{ $data->nis }} </td>  --}}
                    <td> 
                        @if (Auth::user()->role_id == 2)
                            
                        @else
                            <a href="student/{{ $data->id }}">Detail</a>
                            <a href="student_edit/{{ $data->id }}">Edit</a>
                            <a href="student_delete/{{ $data->id }}">Delete</a>
                        @endif
                     
                     </td>
                </tr>
                @endforeach
            </tbody>
          
        </table>
       </div>
       <div class="my-5">

           {{ $studentList->withQueryString()->links()}}
       </div>
    </div>
   

@endsection
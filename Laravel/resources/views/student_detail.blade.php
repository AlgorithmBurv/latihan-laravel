
@extends('layouts.main')

@section('title', 'student_detail')
    
@section('content')
    <h1><center>Halaman student detail</center></h1>
    <br>
    <h3>
        <center>Anda Sedang melihat detail data mahasiswa : {{ $student->name }}</center>
    </h3>
    <br>
 

    <div class="container my-3 d-flex justify-content-center">
        @if ($student->image != '')
            <img src="{{ asset('storage/photo/'.$student->image) }}" alt="" width="200px">         
        @else
            <img src="{{ asset('images/example.png') }}" alt="" width="200px">
        @endif
      
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>          
                    <th>Nama</th>                
                    <th>Class</th>                
                    <th>Gender</th>
                    <th>NIS</th>  
                </tr>
            </thead>
            <tbody>            
                <tr>
                    <td>{{ $student->name }} </td>
                    <td>{{ $student->classRoom->name }} </td>
                    <td>{{ $student->gender }} </td>
                    <td>{{ $student->nis }} </td>
                </tr>
            </tbody>
        </table>
       </div>
  
 

@endsection
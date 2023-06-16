
@extends('layouts.main')

@section('title', 'students')
    
@section('content')
    <h1><center>Halaman Class</center></h1>
    <h3>Student List</h3>
    <table class="table">
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Students</th>
        </tr>
        @foreach ($classList as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name}}</td>
            <td>
                @foreach ( $data->student as $st)
                    {{ $st['name'] }} <br>
                @endforeach
              
            </td>

        </tr>
        @endforeach
    </table>

@endsection
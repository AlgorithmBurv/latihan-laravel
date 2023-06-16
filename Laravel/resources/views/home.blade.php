@extends('layouts.main')

@section('title','Home')

@section('content')
<div class="container">

    <h1>Halaman Home</h1>
    <h2>Welcome  {{ Auth::user()->name }}, Role anda {{ Auth::user()->role->name}}</h2>
    

    {{--  {{ Auth::user() }}  --}}

    {{--  @if ($role=='admin')
        <a href="">Halaman Admin</a>
    @endif  --}}

    {{--  @foreach ($buah as $data)
        {{ $data }} <br>
    @endforeach  --}}
    {{--  <table class="table">
        <tr>
            <th>No. </th>
            <th>Nama</th>
        </tr>
        @foreach ($buah as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data }}</td>
        </tr>
        @endforeach
    </table>  --}}

</div>

@endsection
   
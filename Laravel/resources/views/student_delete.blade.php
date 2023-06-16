@extends('layouts.main')

@section('title', 'students')

@section('content')
<h1>
    <center>Halaman student_delete</center>
</h1>

<div class="mt-5">
    <h2>
    <center>
        Are you sure to delete data: {{ $student->name }}  {{ $student->nis }}
        <br><br>
        <form style="display: inline-block" action="/student_destroy/{{$student->id}} " method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>
      
        <a href="/students"class="btn btn-primary">  Cancel</a>
    </center>  
    </h2>
</div>
@endsection
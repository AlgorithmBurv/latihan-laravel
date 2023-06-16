@extends('layouts.main')

@section('title', 'student_edit')

@section('content')
<div class="container mt-5 col-5 m-auto">
    <form action="/student_edit/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')
        {{--  {{ $student }}
        <br><br>
        {{ $class }}  --}}
        <div class="mb-3">
            <label for="class">Class</label>
           <select name="class_id" id="class" class="form-control" required>
                <option value="{{ $student->classRoom->id}}">{{ $student->classRoom->name}}</option>
                @foreach ($class as $item)
                <option value="{{ $item->id}}">{{ $item->name}}</option>
                
                @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}"  required>
        </div>
       
        <div class="mb-3 ">
            <label for="gender">Gender</label>
           <select name="gender" id="gender" class="form-control" required>
               <option value="{{ $student->gender }}">{{ $student->gender }}</option>
               @if ($student->gender == 'L')
                 <option value="P">P</option>                       
                 @else
                 <option value="L">L</option>             
               @endif
           </select>
        </div>
        <div class="mb-3">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" required>
        </div>
       
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
  </div>
@endsection
@extends('layouts.main')

@section('title', 'student_add')

@section('content')
<h1>
    <center>Halaman student_add</center>
</h1>
  <div class="container mt-5 col-5 m-auto">


    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif


    <form action="student_add" method="post" enctype="multipart/form-data">
        @csrf
        {{--  @dd($class)  --}}
        <div class="mb-3">
            <label for="class">Class</label>
           <select name="class_id" id="class" class="form-control" >
            <option value="">Select One</option>
              @foreach ($class as $item)
                 <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" >
        </div>
       
        <div class="mb-3 ">
            <label for="gender">Gender</label>
           <select name="gender" id="gender" class="form-control" >
               <option value="">Select One</option>
               <option value="L">L</option>
               <option value="P">P</option>
           </select>
        </div>
        <div class="mb-3">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" >
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <div class="input-group">
                <input type="file" class="form-control" id="photo"  name="photo">
           
            </div>
        </div>
       
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
  </div>
@endsection
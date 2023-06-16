<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\classRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Search
        $keyword = $request->keyword;
        $student = Student::with('classRoom')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender',  $keyword)
            ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('classRoom', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(5);

        // dd($keyword);
        //paginate
        // $student = Student::paginate(5);
        // $student = Student::simplePaginate(5);
        //Trashed soft deletes
        // $student = Student::withTrashed()->with('classRoom')->get();

        //eloquent
        // luzzy loading
        // $student = Student::all(); 

        //eager loading
        // $student = Student::with('classRoom')->get();
        // dd("$student");
        return view('students', ['studentList' => $student]);

        //query builder
        // $student = DB::table('students')->get();
        // dd("$student");
        // return view('students', ['studentList' => $student]);

        //contoh collections
        // $nilai = [2, 3, 4, 1, 5, 2, 3, 4, 5];

        // $hasil = collect($nilai)->avg();
        // dd($hasil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $class = classRoom::select('id', 'name')->get();
        return view('student_add', ['class' => $class]);


        //query builder
        // $student = DB::table('students')->insert([
        //     'name' => 'tes',
        //     'gender' => 'L',
        //     'nis' => '134254',
        // ]);

        //eloquent
        // $student = Student::create([
        //     'name' => 'tes',
        //     'gender' => 'L',
        //     'nis' => '134254',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        //Photo
        // return $request->file('photo')->store('photo');
        //Photo custom name
        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] =  $newName;
        $student = Student::create($request->all());
        if ($student) {
            Session::flash('status', 'succes');
            Session::flash('message', 'add new student succes... !');
        }

        return redirect('/students');
        // dd($request->all());
        // $student = new student;
        // $student->class_id = $request->class_id;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->save();

        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:10|required',
        //     'name' => 'required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);
        //mass assigment
        // $student = Student::create($request->all());
        // if ($student) {
        //     Session::flash('status', 'succes');
        //     Session::flash('message', 'add new student succes... !');
        // }
        // return redirect('/students');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with(['classRoom'])->findOrFail($id);
        return view('student_detail', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $request, $id)
    {
        // dd('test');
        $student = Student::with('classRoom')->findOrFail($id);
        $class = classRoom::where('id', '!=', $student->class_id)->select('id', 'name')->get();
        return view('student_edit', ['student' => $student], ['class' => $class]);
        // return view('student_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/students');

        //query builder
        // $student = DB::table('students')->where('id', 5)->update([
        //     'name' => 'Mamat',
        //     'gender' => 'L',
        //     'nis' => '134254',
        // ]);
        //eloquent
        // $student = Student::findOrFail([
        //     'name' => 'tes',
        //     'gender' => 'L',
        //     'nis' => '134254',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student_delete', ['student' => $student]);
        // dd($id);

        //query builder
        // $student = DB::table('students')->where('id', 5)->delete();
        //eloquent
        // $student = Student::find(6)->delete();
    }
    public function destroy($id)
    {
        // $delete = DB::table('students')->where('id', $id)->delete();
        $delete = Student::findOrFail($id)->delete();
        if ($delete) {
            Session::flash('status', 'succes');
            Session::flash('message', 'Delete student succes... !');
        }
        return redirect('/students');
        // dd($id);

        //query builder
        // $student = DB::table('students')->where('id', 5)->delete();
        //eloquent
        // $student = Student::find(6)->delete();
    }
    public function deleted_student()
    {
        $deleted_student = student::onlyTrashed()->get();
        // dd($deleted_student);
        return view('student_deleted_list', ['deleted_student' =>  $deleted_student]);
    }
    public function restore($id)
    {
        $deleted_student = student::withTrashed()->where('id', $id)->restore();
        // dd($deleted_student);
        if ($deleted_student) {
            Session::flash('status', 'succes');
            Session::flash('message', 'Restore student succes... !');
        }
        return redirect('/students');
    }
}

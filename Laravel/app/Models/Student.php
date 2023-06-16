<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ClassRoomController;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    // protected $primaryKey = 'id_student';
    protected $fillable = [
        'class_id', 'name', 'gender', 'nis', 'image'
    ];





    public function classRoom()
    {
        return $this->belongsTo(classRoom::class, 'class_id', 'id');
    }
}

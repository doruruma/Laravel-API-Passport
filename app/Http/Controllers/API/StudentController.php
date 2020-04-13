<?php

namespace App\Http\Controllers\API;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $successStatus = 200;

    public function fetch()
    {
        return response()->json(Student::all(), $this->successStatus);
    }

}

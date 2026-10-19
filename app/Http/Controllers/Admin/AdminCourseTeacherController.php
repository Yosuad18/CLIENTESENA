<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AdminCourseTeacherController extends Controller
{
    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $courseTeachers = json_decode(json_encode(Http::get($url . '/course-teachers?included=course,teacher')->json())) ?? [];

        return view('admin.course_teachers.index', compact('courseTeachers'));
    }
}

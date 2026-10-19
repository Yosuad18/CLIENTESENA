<?php

namespace App\Http\Controllers\Admin;

class AdminCourseTeacherController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.course-teachers.index';
    }

    public function index()
    {
        $courseTeachers = $this->list('/course-teachers?included=course,teacher');

        return view('admin.course_teachers.index', compact('courseTeachers'));
    }
}

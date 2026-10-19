<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CourseManagementLinksTest extends TestCase
{
    public function test_course_management_links_open_the_admin_forms(): void
    {
        Http::fake(function (Request $request) {
            $path = parse_url($request->url(), PHP_URL_PATH);

            if (is_string($path) && preg_match('~/courses/1$~', $path)) {
                return Http::response([
                    'id' => 1,
                    'course_number' => '123',
                    'name' => 'Curso de prueba',
                    'day' => 'Diurna',
                    'image' => null,
                    'deadline' => null,
                ], 200);
            }

            if (is_string($path) && preg_match('~/courses$~', $path)) {
                return Http::response([[
                    'id' => 1,
                    'course_number' => '123',
                    'name' => 'Curso de prueba',
                    'day' => 'Diurna',
                    'image' => null,
                    'deadline' => null,
                ]], 200);
            }

            return Http::response([], 200);
        });

        $index = $this->get('/courses');

        $index->assertOk()
            ->assertSee(route('admin.courses.create'))
            ->assertSee(route('admin.courses.edit', 1))
            ->assertSee(route('admin.courses.destroy', 1));

        $this->get(route('admin.courses.create'))->assertOk();
        $this->get(route('admin.courses.edit', 1))->assertOk();
    }
}

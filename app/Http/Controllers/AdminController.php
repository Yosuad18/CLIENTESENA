<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');

        $modules = [
            [
                'key'      => 'areas',
                'label'    => 'Áreas de Formación',
                'desc'     => 'Áreas de formación',
                'icon'     => 'fa-layer-group',
                'color'    => 'green',
                'route'    => 'admin.areas.index',
                'endpoint' => '/areas',
            ],
            [
                'key'      => 'courses',
                'label'    => 'Cursos',
                'desc'     => 'Cursos y fichas',
                'icon'     => 'fa-book',
                'color'    => 'green',
                'route'    => 'admin.courses.index',
                'endpoint' => '/courses',
            ],
            [
                'key'      => 'teachers',
                'label'    => 'Instructores',
                'desc'     => 'Docentes del centro',
                'icon'     => 'fa-chalkboard-teacher',
                'color'    => 'green',
                'route'    => 'admin.teachers.index',
                'endpoint' => '/teachers',
            ],
            [
                'key'      => 'apprentices',
                'label'    => 'Aprendices',
                'desc'     => 'Aprendices inscritos',
                'icon'     => 'fa-user-graduate',
                'color'    => 'green',
                'route'    => 'admin.apprentices.index',
                'endpoint' => '/apprentices',
            ],
            [
                'key'      => 'computers',
                'label'    => 'Computadores',
                'desc'     => 'Equipos del laboratorio',
                'icon'     => 'fa-desktop',
                'color'    => 'green',
                'route'    => 'admin.computers.index',
                'endpoint' => '/computers',
            ],
            [
                'key'      => 'training-centers',
                'label'    => 'Centros de Formación',
                'desc'     => 'Centros SENA',
                'icon'     => 'fa-building',
                'color'    => 'green',
                'route'    => 'admin.training-centers.index',
                'endpoint' => '/training-centers',
            ],
            [
                'key'      => 'course-teachers',
                'label'    => 'Cursos e Instructores',
                'desc'     => 'Asignaciones (solo consulta)',
                'icon'     => 'fa-link',
                'color'    => 'orange',
                'route'    => 'admin.course-teachers.index',
                'endpoint' => '/course-teachers',
            ],
        ];

        foreach ($modules as &$module) {
            $module['count'] = $this->countFrom($url . $module['endpoint']);
        }
        unset($module);

        return view('admin.panel', compact('modules'));
    }

    private function countFrom(string $url): int
    {
        try {
            $response = Http::get($url);

            if (!$response->successful()) {
                return 0;
            }

            $json = $response->json();

            if (is_array($json) && isset($json['data']) && is_array($json['data'])) {
                return count($json['data']);
            }

            return is_array($json) || is_object($json) ? count((array) $json) : 0;
        } catch (\Throwable $e) {
            return 0;
        }
    }
}

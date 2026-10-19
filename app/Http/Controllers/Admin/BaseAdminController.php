<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

abstract class BaseAdminController extends Controller
{
    protected function apiUrl(string $path = ''): string
    {
        return rtrim(env('URL_SERVER_API'), '/') . '/' . ltrim($path, '/');
    }

    protected function list(string $path): array
    {
        $response = Http::get($this->apiUrl($path));

        if ($response->failed()) {
            return [];
        }

        $data = $response->json();

        if (is_array($data) && array_key_exists('data', $data) && is_array($data['data'])) {
            $data = $data['data'];
        }

        if (!is_array($data)) {
            $data = [$data];
        }

        return array_map(fn ($item) => json_decode(json_encode($item), false), $data);
    }

    protected function item(string $path)
    {
        $response = Http::get($this->apiUrl($path));

        if ($response->failed()) {
            return null;
        }

        $data = $response->json();

        if (is_array($data) && array_key_exists('data', $data)) {
            $data = $data['data'];
        }

        return json_decode(json_encode($data), false);
    }

    protected function send(string $method, string $path, array $data = [], $fileField = null)
    {
        $url = $this->apiUrl($path);

        if ($fileField && $fileField instanceof \Illuminate\Http\UploadedFile) {
            return Http::attach(
                'image',
                file_get_contents($fileField->getRealPath()),
                $fileField->getClientOriginalName()
            )->{$method}($url, $data);
        }

        return Http::{$method}($url, $data);
    }

    protected function persist(Request $request, string $method, string $path, array $data, string $fileField = 'image', string $successMessage = 'Registro guardado correctamente.')
    {
        $file = $request->file($fileField);

        $response = $this->send($method, $path, $data, $file);

        if ($response->successful()) {
            return redirect()->route($this->redirectRoute())->with('success', $successMessage);
        }

        $message = $response->json('message') ?? 'No se pudo guardar el registro. Verifica que la API esté disponible.';

        return back()->with('error', $message)->withInput();
    }

    protected function destroyRecord(string $path, string $successMessage = 'Registro eliminado correctamente.')
    {
        $response = Http::delete($this->apiUrl($path));

        if ($response->successful()) {
            return redirect()->route($this->redirectRoute())->with('success', $successMessage);
        }

        $message = $response->json('message') ?? 'No se pudo eliminar el registro.';

        return back()->with('error', $message);
    }

    abstract protected function redirectRoute(): string;
}

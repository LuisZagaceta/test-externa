<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
//
use App\Models\TareasModel;
use App\Models\EstadosModel;

class TareasController extends Controller {

    public function index(Request $request) {
        return view('tareas.index');
    }

    public function nuevo(Request $request): View {
        $estados = EstadosModel::get();

        return view('tareas.crear_editar', [
            'tarea' => [],
            'estados' => $estados->toArray(),
            'action' => './api/tareas/crear',
            'modal' => 'nuevo'
        ]);
    }

    public function show(Request $request, int $id_tarea): View {
        $tarea = TareasModel::with('estado')->findOrFail($id_tarea);
        $estados = EstadosModel::get();

        return view('tareas.crear_editar', [
            'tarea' => $tarea->toArray(),
            'estados' => $estados->toArray(),
            'action' => './api/tareas/editar/' . $tarea->id_tarea,
            'modal' => 'editar'
        ]);
    }
}

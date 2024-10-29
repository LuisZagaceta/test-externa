<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//
use App\Models\TareasModel;

class TareasApi extends Controller {

    public function index(Request $request) {
        $inputs = $request->input();

        $output = [
            'success' => false,
            'draw' => intval($inputs['draw']),
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => []
        ];

        $tareas = TareasModel::with('estado')->get();

        $total = TareasModel::count();

        if (isset($tareas) && !empty($tareas)) {
            $output['success'] = true;
            $output['recordsTotal'] = $total;
            $output['recordsFiltered'] = $total;
            $output['data'] = $tareas->toArray();
        }

        return response()->json($output);
    }

    public function update(Request $request, int $id_tarea) {
        $data = $request->input();

        $tareaObject = TareasModel::find($id_tarea);
        $tareaObject->dni = $data['dni'];
        $tareaObject->titulo = $data['titulo'];
        $tareaObject->descripcion = $data['descripcion'];
        $tareaObject->fecha_vencimiento = $data['fecha_vencimiento'];
        $tareaObject->id_estado = $data['id_estado'];
        $tareaObject->updated_at = date('Y-m-d H:i:s');

        $update = $tareaObject->save();

        $output = [
            'success' => $update
        ];

        return response()->json($output);
    }

    public function create(Request $request) {
        $data = $request->input();

        $tareaObject = new TareasModel;
        $tareaObject->dni = $data['dni'];
        $tareaObject->titulo = $data['titulo'];
        $tareaObject->descripcion = $data['descripcion'];
        $tareaObject->fecha_vencimiento = $data['fecha_vencimiento'];
        $tareaObject->id_estado = $data['id_estado'];
        $tareaObject->created_at = date('Y-m-d H:i:s');

        $insert = $tareaObject->save();

        $output = [
            'success' => $insert
        ];

        return response()->json($output);
    }

    public function delete(Request $request, int $id_tarea) {
        $tareaObject = TareasModel::find($id_tarea);

        $delete = $tareaObject->delete();

        $output = [
            'success' => $delete
        ];

        return response()->json($output);
    }
}

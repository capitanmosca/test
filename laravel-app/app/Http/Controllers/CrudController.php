<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Detail;

class CrudController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(Student $studentModel, Detail $detailModel) {
      $estudiantes = $studentModel::join("details", "students.id", "=", "details.student_id")
      ->select('*')
      ->get();
      return view('crud/index')
      ->with('estudiantes', $estudiantes);
    }

    function add() {
      return view('crud/edit');
    }

    function edit($estudiante_id, Student $studentModel) {
      $estudiante = $studentModel::join("details", "students.id", "=", "details.student_id")
      ->select('*')
      ->where('students.id', $estudiante_id)
      ->first();
      return view('crud/edit')
      ->with('estudiante', $estudiante);
    }

    function save(Student $studentModel, Detail $detailModel, Request $request) {
      try {
        if($request->has('id')) $student = $studentModel->find($request->id);
        else $student = new $studentModel();

        $student->name = $request->student['name'];
        $student->email = $request->student['email'];
        $student->save();

        if($request->has('id')) $detail = $detailModel->where('student_id', $student->id)->first();
        else $detail = new $detailModel();

        $detail->student_id = $student->id;
        $detail->group = $request->detail['grupo'];
        $detail->language = $request->detail['idioma'];
        $detail->save();

        $route = url('');

        echo "Se guardo la información exitosamente <a href=\"{$route}\">Regresar</a>";

      } catch(Exception $e) {
        echo "Hubo un erro al guardar la información";
      }
    }

    function delete($estudiante_id, Student $studentModel, Detail $detailModel, Request $request) {
      try {
        $student = $studentModel->find($estudiante_id);
        $detail = $detailModel->where('student_id', $estudiante_id);

        if($student) $student->delete();
        if($detail) $detail->delete();

        $route = url('');

        echo "Se elimino la información exitosamente <a href=\"{$route}\">Regresar</a>";
      } catch(Exception $e) {
        echo "No hay información a eliminar";
      }
    }
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinion;
use App\CentroAyuda;
use Codedge\Fpdf\Fpdf\Fpdf;

class OpinionController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return Opinion::all();
//    }

    public function show()
    {
        $opinion = Opinion::where('user_id', $user_id)->where('centro_ayuda_id', $centro_ayuda_id)->get();
        if (!$opinion2->toArray()) {
            return response()->json('No se encontro opinion registrada para el centro de ayuda seleccionado.', 400);
        }
        return $opinion[0];
    }

    public function store(Request $request)
    {
        if (!$this->validarName($request)) {
            return response()->json('Error al calificar un centro de ayuda.', 400);
        }

        if (!$this->validarUserId($request)) {
            return response()->json('Error al calificar un centro de ayuda. Usuario inexistente.', 400);
        }

        if (!$this->validarCentroAyudaId($request)) {
            return response()->json('Error al calificar un centro de ayuda. Centro de ayuda no definido.', 400);
        }

        if (!$this->validarAverage($request)) {
            return response()->json('Error. Debe ingresar una calificacion.', 400);
        }

        $opinion = Opinion::create($request->all());
        if ($this->updateCentroAyuda($request->input('centro_ayuda_id'), $request->input('average'))) {
            return response()->json($opinion, 201);
        } else {
            return response()->json('Error. No se encontro el centro de ayuda deseado.', 400);
        }
    }

//    public function update(Request $request, $centro_ayuda_id) {
//        if (!$this->validarUserId($request)) {
//            return response()->json('Error al calificar un centro de ayuda. Usuario inexistente.', 400);
//        }
//
//        if (!$this->validarCentroAyudaId($request)) {
//            return response()->json('Error al calificar un centro de ayuda. Centro de ayuda no definido o ya existente', 400);
//        }
//
//        if ($opinion = Opinion::where('user_id', $request->input('user_id'))->where('centro_ayuda_id', $centro_ayuda_id)->get()->toArray()) {
//            $opinion = new Opinion();
//            $opinion->newQuery();
//            $opinion->where('centro_ayuda_id', $centro_ayuda_id)->update($request->all());
//            if ($this->updateCentroAyuda($request->input('centro_ayuda_id'), $request->input('average'))) {
//                return response()->json($opinion, 201);
//            } else {
//                return response()->json('Error. Ya existe no se encontro el centro de ayuda.', 400);
//            }
//        } else {
//            return response()->json('Error al actulizar la opinion en el centro de ayuda', 500);
//        }
//    }
//    public function delete(Opinion $opinion) {
//        $opinion->delete();
//        return response()->json('Opinion eliminada', 204);
//    }

    public function validarName(Request $request)
    {
        $name = $request->input('name');
        if (!$name || !isset($name)) {
            return false;
        }
        return true;
    }

    public function validarAverage(Request $request)
    {
        $average = $request->input('average');
        if (!$average || !isset($average)) {
            return false;
        }
        return true;
    }

    public function validarUserId(Request $request)
    {
        $user_id = $request->input('user_id');
        if (!$user_id || !isset($user_id)) {
            return false;
        }

        $user = \App\User::where('id', $user_id)->get();
        if (emptyArray($user)) {
            return true;
        }
        return false;
    }

    public function validarCentroAyudaId(Request $request)
    {
        $centro_ayuda_id = $request->input('centro_ayuda_id');
        if (!$centro_ayuda_id || !isset($centro_ayuda_id)) {
            return false;
        }

        $centroAyuda = \App\CentroAyuda::where('id', $centro_ayuda_id)->get();
        if (emptyArray($centroAyuda)) {
            return true;
        }
        return false;
    }

    public function updateCentroAyuda()
    {
        if ($centroAyuda = CentroAyuda::where('id', $centro_ayuda_id)->get()->toArray()) {
            $voters = $centroAyuda[0]['voters'];
            $general = (($centroAyuda[0]['average_general'] * $voters) + $average) / ($voters + 1);
            CentroAyuda::where('id', $centro_ayuda_id)->update(['voters' => $voters + 1, 'average_general' => $general]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * pdf centros ayudas
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteOpinion()
    {
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->Rect(10, 35, 195, 240);
        $pdf->SetFont('Arial', 'B', 14);

        $pdf->Cell(10, 8, '', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(217, 217, 217);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(193, 7, 'Opiniones Centros de Ayuda de la Ciudad De Santa Fe', 0, 1, 'C', 1);

//        $pdf->Cell(10, 5, '', 0, 0, 'L');
        // obtener las opiniiones de los centros de ayuda ordenados por calificacion
        //$opiniones = Opinion::All();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(10, 5, '', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetFillColor(85, 64, 99);
        $pdf->SetTextColor(255, 255, 255);
        $widthColumns = array(50, 120, 23);
        $pdf->initializeTable($widthColumns);

        $pdf->TableRow(1, array('Nombre', 'Comentario', 'Calificacion'), 1, 'L', 1);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($opiniones as $opinion) {
            $pdf->TableRow(1, array($opinion->name(), $opinion->comments(), $opinion->average()), 0, 'C', 0);
        }

        $pdf->Output();
        exit;
    }

    function Header()
    {
        $this->Rect(10, 5, 195, 25);
        $this->SetFont('Arial', 'B', 8);
        $this->Image(__DIR__ . '/../../../../../public/72.png', 178, 7, 20);
        $this->SetFont('Arial', '', 9);
        $this->SetY(5);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(48, 5, '', 0, 0, 'L');
        $this->Cell(30, 8, ' ', 0, 1, 'L');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(3, 2, '', 0, 0, 'L');
        $this->Cell(15, 2, 'MUJERES LIBRES SFC', 0, 0, 'L');
        $this->SetFont('Arial', '', 9);
        $this->Cell(30, 4, '', 0, 0, 'L');
        $this->Cell(45, 4, '', 0, 1, 'L');
        $this->SetFont('Arial', '', 9);
        $this->Cell(12, 4, '', 0, 0, 'L');
        $this->Cell(40, 4, 'Reportes', 0, 0, 'L');
        $this->Cell(3, 4, '', 0, 0, 'L');
        $this->Cell(125, 4, '', 0, 1, 'L');
        $this->SetFont('Arial', '', 9);
        $this->Cell(5, 4, '', 0, 0, 'L');
        $this->Cell(40, 4, '', 0, 0, 'L');
        $this->SetFont('Arial', '', 9);
        $this->Cell(3, 4, '', 0, 0, 'L');
        $this->Cell(30, 4, '', 0, 1, 'L');
        $this->SetFont('Arial', '', 9);
        $this->SetFont('Arial', '', 7);
        $this->Cell(76, 4, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(10, 7, '', 0, 1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->Rect(10, 280, 195, 10);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(170, 5, 'Municipalidad de Santa Fe - Universidad Nacional del Litoral', 0, 0, 'L');
        $this->Cell(20, 5, 'Pagina: ' . $this->PageNo() . '/ {nb}', 0, 0, 'R');
    }
}

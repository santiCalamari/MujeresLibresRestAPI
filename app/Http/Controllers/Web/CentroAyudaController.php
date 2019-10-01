<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CentroAyuda;
use Codedge\Fpdf\Fpdf\Fpdf;

class CentroAyudaController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return CentroAyuda::all();
//    }


    public function show()
    {
        return CentroAyuda::where('id', $centro_ayuda_id)->get();
    }

//        public function store(Request $request) {
//        $centroAyuda = CentroAyuda::create($request->all());
//        return response()->json($centroAyuda, 201);
//    }


    public function update(Request $request, CentroAyuda $centroAyuda)
    {
        if (!$this->validarAverageGeneral($request)) {
            return response()->json('Error al guardar la calificacion.', 400);
        }

        if (!$this->validarVoters($request)) {
            return response()->json('Error al guardar el usuario votante.', 400);
        }

        $centroAyuda->update($request->all());
        return response()->json($centroAyuda, 200);
    }

//    public function delete(CentroAyuda $centroAyuda) {
//        $centroAyuda->delete();
//        return response()->json('CentroAyuda eliminada', 204);
//    }

    public function validarAverageGeneral(Request $request)
    {
        $average_general = $request->input('average_general');
        if (!isset($average_general)) {
            return false;
        }
        return true;
    }

    public function validarVoters(Request $request)
    {
        $voters = $request->input('voters');
        if (!isset($voters)) {
            return false;
        }
        return true;
    }

    /**
     * pdf centros ayudas
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteCentrosAyudas()
    {
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->Rect(10, 35, 195, 240);
        $pdf->SetFont('Arial', 'B', 14);

        $pdf->Cell(10, 8, '', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(217, 217, 217);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(193, 7, 'Centros de Ayuda de la Ciudad De Santa Fe', 0, 1, 'C', 1);

//        $pdf->Cell(10, 5, '', 0, 0, 'L');
        // obtener los centros de ayuda ordenados por calificacion descendiente
        //$centrosAyudas = CentroAyuda::All();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(10, 5, '', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetFillColor(85, 64, 99);
        $pdf->SetTextColor(255, 255, 255);
        $widthColumns = array(50, 45, 25, 26, 20, 27);
        $pdf->initializeTable($widthColumns);


        $pdf->TableRow(1, array('Nombre',
            'Direccion',
            'Telefono',
            'Horarios',
            'Calificacion',
            'Cant. opiniones'), 1, 'L', 1);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
//        foreach ($centrosAyudas as $ca) {
//            $pdf->TableRow(1, array(
//                $ca->nombre(),
//                $ca->direccion,
//                $ca->telefono,
//                $ca->horarios,
//                $ca->calificacion,
//                $ca->cantidad_votantes
//                ), 0, 'C', 0);
//        }


        $pdf->Output();
        exit;
    }
}

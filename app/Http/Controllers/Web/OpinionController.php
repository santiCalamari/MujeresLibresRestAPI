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

    /**
     * Inicializa Tabla de un PDF.
     *
     * @param type $widthColumns : Array con anchos de cada columna  de la tabla. Ej: [10, 30, 20, 15, 15, 20] 
     */
    public function initializeTable($widthColumns)
    {
        $this->tableWidths = $widthColumns;
    }

    /**
     * Row de tabla de un PDF: 
     * 
     * Primero se debe inicializar la tabla con los anchos de las columnas de la tabla: $this->initializeTable($widthColumns)
     * 
     * Por cada fila de una se debe definir:
     * 
     * @param type $margin - Margen izquierdo de la fila de la tabla.  Ej: 10. default: 0
     * @param type $data - Datos de las celdas de la fila. ej: ["text col1", "text col2",... ,"text coln"]
     * @param type $border - Celdas de la fila con borde. Ej: si = '1', no = '0', dafault ='0' 
     * @param type $align - Alineacion del texto de cada celda de la fila. Ej:'R', dafault ='L' 
     * @param type $filled = 0 - Celdas de la fila rellenas. Ej: i = '1', no = '0', dafault ='0' 
     */
    public function TableRow($margin = 0, $data, $border = 0, $align = 'L', $filled = 0)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->tableWidths[$i], $data[$i]));
        $h = 5 * $nb;

        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->tableWidths[$i];
            $a = isset($align) ? $align : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x + $margin, $y, $w, $h);

            $this->Cell($margin, $h, '');
            //Print the text
            $this->MultiCell($w, 5, $data[$i], $border, $a, $filled);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    private function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    private function NbLines($w, $txt)
    {
//Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l+=$cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}

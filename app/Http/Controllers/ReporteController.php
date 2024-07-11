<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitantesExport;

class ReporteController extends Controller
{
    public function export()
    {
      
        return Excel::download(new VisitantesExport, 'reporte_visitantes.xlsx');
    }

    public function index()
    {
      
        return view('visitantes.index');
    }
}

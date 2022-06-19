<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
class ExportpdfController extends Controller
{
public function pdf(){
$data=User::all();
$pdf=pdf::loadView('pdf.users',['data'=>$data]);
return $pdf->stream('document.pdf');
}
}

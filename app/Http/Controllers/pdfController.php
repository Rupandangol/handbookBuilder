<?php

namespace App\Http\Controllers;

use App\Model\ProjectContentTitle;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function previewPdf(Request $request)
    {
        $data=ProjectContentTitle::where(['project_id'=>$request->project_id])->orderBy('order_by','asc')->get();
        $pdf = PDF::loadView('Backend.pages.project.pdf',compact('data'));
        return $pdf->stream();
    }
}

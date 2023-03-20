<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use PDF;

class EmailController extends Controller
{
    public function sendEmail($idReport)
    {
        Mail::send(['text'=>'emails.message'], [], function($message) use($idReport){
            
            $report = $this->internalRequest('/api/reports/'.$idReport, 'GET')->data;
            
            $pdf = PDF::loadView('emails.pdf',compact('report'));

            $message->to('alexandremontebelo@gmail.com','Alexandre')->subject('Laravel Challenge');

            $message->from('alexandremontebelo@gmail.com','Alexandre');

            $message->attachData($pdf->output(), 'report.pdf');

        });
    }

    // public function show(Request $request)
    // {
        
    //     $report = $this->internalRequest('/api/reports/'.$request->report, 'GET')->data;
    //     return view('emails.pdf', compact('report'));

        // $pdf = PDF::loadView('emails.pdf',compact('report'));
        // return $pdf->download('pdfview.pdf');
    // }
}

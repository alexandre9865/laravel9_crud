<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use PDF;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $id = $request->report;
        Mail::send(['text'=>'emails.message'], ['request' => $request], function($message) use($id){
            
            $report = $this->internalRequest('/api/reports/'.$id, 'GET')->data;
            
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

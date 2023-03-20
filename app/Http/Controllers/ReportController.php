<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $reports = $this->internalRequest('/api/reports', 'GET')->data;
        foreach($reports as &$report){

            $report->profile = '';
            foreach($report->profiles as $profile){
                $report->profile .= $profile->first_name.' '.$profile->last_name.', ';
            }
            $report->profile = trim($report->profile, ', ');
        }

        return view('report.index', compact('reports'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $profiles = $this->internalRequest('/api/profiles', 'GET')->data;
        return view('report.create', compact('profiles'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $reportsRequest = $this->internalRequest('/api/reports', 'POST', $request->post());
        if(isset($reportsRequest->errors)){
            return redirect()->back()->withErrors($reportsRequest->errors);
        }
        $email = new EmailController();
        $email->sendEmail($reportsRequest->data->id_report);
        return redirect()->route('reports.index')->with('success','Report has been created successfully and sent to email.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Report  $report
    * @return \Illuminate\Http\Response
    */
    public function show(Report $report)
    {
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Report  $profile
    * @return \Illuminate\Http\Response
    */
    public function edit(Report $report)
    {
        $profiles = $this->internalRequest('/api/profiles', 'GET')->data;
        return view('report.edit', compact('report'), compact('profiles'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Report  $report
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Report $report)
    {
        $reportsRequest = $this->internalRequest('/api/reports/'.$report->id_report, 'PUT', $request->post());
        if(isset($reportsRequest->errors)){
            return redirect()->back()->withErrors($reportsRequest->errors);
        }
        return redirect()->route('reports.index')->with('success','Report has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Report  $report
    * @return \Illuminate\Http\Response
    */
    public function destroy(Report $report)
    {
        $reportsRequest = $this->internalRequest('/api/reports/'.$report->id_report, 'DELETE');
        if(isset($reportsRequest->errors)){
            return redirect()->route('reports.index')->with('error','The specified Report could not be deleted. Try again later.');
        }
        return redirect()->route('reports.index')->with('success','Report has been deleted successfully');
    }

}

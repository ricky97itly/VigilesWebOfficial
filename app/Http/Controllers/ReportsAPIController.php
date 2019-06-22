<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Report;
use App\Http\Resources\Report as ReportResource;

class ReportsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Prende 10 segnalazioni
        $reports = Report::paginate(20);

        // Restituisce collection segnalazioni come Resource
        return ReportResource::collection($reports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $report = $request->isMethod('put') ? Report::findOrFail($request->report_id) : new Report;

      $report->id = $request->input('report_id');
      $report->user_id = $request->input('user_id');
      $report->code_id = $request->input('code_id');
      $report->zone_id = $request->input('zone_id');
      $report->title = $request->input('title');
      $report->address = $request->input('address');
      $report->street_number = $request->input('street_number');
      $report->description = $request->input('description');
      $report->tags = $request->input('tags');
      $report->media = $request->input('media');

      if($report->save()) {
        return new ReportResource($report);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // Prendo una singola segnalazione
      $report = Report::findOrFail($id);

      // Ritorno la segnalazione singola come resource
      return new ReportResource($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Prendo una singola segnalazione
      $report = Report::findOrFail($id);

      // Ritorno la segnalazione appena cancellata come resource
      if($report->delete()) {
        return new ReportResource($report);
      }
    }
}

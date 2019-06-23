<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Validator;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('reports');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'bail|required|string',
      'address' => 'bail|required|string',
      'street_number' => 'bail|required|integer',
      'description' => 'string',
      'tags' => 'string'
    ]);

    // Azioni conseguenti alla validazione
    if ($validator->fails()) {
      // ERRORE - Torna alla view precedente ritornando gli errori
      return redirect('/reports')->withErrors($validator);
    } else {
      $report = new Report;
      $report->user_id = Auth::user()->id;
      $report->zone_id = 1;
      $report->code_id = 1;
      $report->title = $request->input("title");
      $report->address = $request->input("address");
      $report->street_number = $request->input("street_number");
      $report->description = $request->input("description");
      $report->tags = $request->input("tags");

      if ($request->hasFile('media') && $request->file('media')->isValid()) {
        $path = $request->media->store('reports/images');
        $report->media = url($path);
      }

      // Salva, alert e torna alla home
      if($report->save()) {
        Alert::success("La tua segnalazione è stata inoltrata!");
        return redirect('/');
      }
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
    $report = Report::findOrFail($id);
    $user = User::where('id', $report->user_id)->firstOrFail();
    $report->user_name = $user->name;
    $report->user_surname = $user->surname;
    return view ('report_detail')->with('report', $report);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $report = Report::findOrFail($id);
    return view ('report_detail')->with('report', $report);
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
    $validator = Validator::make($request->all(), [
      'title' => 'bail|required|string',
      'address' => 'bail|required|string',
      'street_number' => 'bail|required|integer',
      'description' => 'string',
      'tags' => 'string'
    ]);

    // Azioni conseguenti alla validazione
    if ($validator->fails()) {
      // ERRORE - Torna alla view precedente ritornando gli errori
      return redirect('/reports')->withErrors($validator);
    } else {
      $report = Report::findOrFail($id);
      $report->user_id = intval($request->input('user_id'));
      $report->zone_id = 1;
      $report->code_id = intval($request->input('code_id'));
      $report->title = $request->input('title');
      $report->address = $request->input('address');
      $report->street_number = $request->input('street_number');
      $report->description = $request->input('description');
      $report->tags = $request->input('tags');
      $report->media = $request->input('media');

      // Salva, alert e torna alla home
      if($report->save()) {
        Alert::success("La segnalazione è stata aggiornata!");
        return redirect('/');
      }
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //con findOrFail mi trova l'elemento, se non c'è esce errore
      $reports = Report::findOrFail($id);
      $reports->delete();
      return back();
  }
}

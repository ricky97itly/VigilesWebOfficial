<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Messages;

/** PER OPERATORE */
class ChatViewController extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function show(Report $report, Request $request)
    {
      return view('chat', compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Report $report, Request $request)
    {
      /** Parametri necessari per invio messaggio */
        if(! empty($report->id)) {
          $message = new Messages;
          $message->sender_id = $request->user()->id;
          $message->receiver_id = $report->user_id;
          $message->message = $request->message;
          $message->report_id = $report->id;
          if($message->save()) {
            return back();
          }
          return 'Non salvato';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listChats(Request $request)
    {
      /** Per fare apparire ad utente lista chat */
        $reports = Report::where('user_id', $request->user()->id)->whereHas('messages')->get();
        return view('chat-list-utente', compact('reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messagesInReport(Report $report, Request $request)
    {
      // Mostra interfaccia chat utente 
        return view('userChat', compact('report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

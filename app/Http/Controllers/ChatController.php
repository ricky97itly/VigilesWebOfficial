<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Messages;

/** PER UTENTE */
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /** Lista messaggi che vede utente */
    public function listMessages(Request $request)
    {
      /** Vuota perché si riempie quando operatore scrive ad utente */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /** Verifica se parametri sono giusti per poter ricevere messaggio */
    public function receive(Report $report, Request $request)
    {
      if(! empty($report->id) && !empty($request->input('user_id')) && $request->input('user_id') == $report->user_id) {
        $message = new Messages();
        $message->report_id = $report->id;
        $message->sender_id = $request->input('user_id');
        $message->message = $request->input('message');
        $message->save();
        return $message;
      }
      return 'No report found.';
    }

}

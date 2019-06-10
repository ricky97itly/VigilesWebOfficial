<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Messages;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMessages(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

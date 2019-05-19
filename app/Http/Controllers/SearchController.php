<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class SearchController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function search(Request $request) {
    if(!$request->searchKey == null) {
      $reports = Report::search($request->searchKey)->get();
    }
    else {
      $reports = null;
    }
    return view('search_result')->with('reports', $reports);
  }
}

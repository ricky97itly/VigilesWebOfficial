<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  // Definizione delle relazioni

  // UNA chat è relativa ad UN report
  public function report() {
    return $this->belongsTo('App\Report');
  }

  // UNA chat è relativa ad UNO user
  public function user() {
    return $this->belongsTo('App\User');
  }


}

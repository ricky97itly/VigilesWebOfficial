<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
  // Definizione delle relazioni

  // Ad UN codice colore possono essere associato MOLTI record
  // Uno a molti
  public function reports() {
    return $this->hasMany('App\Report');
  }
}

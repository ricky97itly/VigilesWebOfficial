<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
  // Definizione delle relazioni

  // UNA zona può contenere MOLTI reports
  public function reports() {
    return $this->hasMany('App\Report');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'title', 'address', 'street_number'
    ];

    // Definizione delle relazioni

    // Un report è fatto da UN solo utente
    public function user() {
      return $this->belongsTo('App\User');
    }

    // UN report può avere UN solo codice
    public function code() {
      return $this->belongsTo('App\Code');
    }

    // UN report può avere UNA sola zona
    public function zone() {
      return $this->belongsTo('App\Zone');
    }

    // UN report può avere UNA sola chat
    public function chat() {
      return $this->hasOne('App\Chat');
    }
}
